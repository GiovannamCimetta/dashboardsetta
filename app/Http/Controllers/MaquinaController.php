<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineLog;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MaquinaController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function create()
    {
        $machines = Machine::all();
        return view('pages.machines', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Codigo_Maquina' => 'required|string|max:20|unique:machines,Codigo_Maquina',
            'Fabricante' => 'required|string|max:255',
            'Descrição' => 'required|string|max:255',
            'Cidade' => 'required|string|max:255',
        ]);

        $geocodeResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $validated['Cidade'],
            'limit' => 1,
            'appid' => env('OPENWEATHERMAP_API_KEY'),
        ]);

        $geocodeData = $geocodeResponse->json();
        if (count($geocodeData) > 0) {
            $lat = $geocodeData[0]['lat'];
            $lon = $geocodeData[0]['lon'];
            $weatherData = $this->weatherService->getWeather($lat, $lon);

            if (isset($weatherData['main']['temp'])) {
                $validated['Temperatura'] = $weatherData['main']['temp'];
                $validated['Eficiencia'] = $this->calculateEfficiency($validated['Temperatura']);
            }
        }
        // dd($weatherData);
        Machine::create($validated);
        // return redirect()->route('machines.index')->with('sucess','Criado com sucesso maquina ID '.$request->Codigo_Maquina );
        return redirect()->route('machines.index');
    }

    public function index()
    {
        // Obtem todas as máquinas, ordena por data de criação em ordem decrescente e aplica paginação
        $machines = Machine::orderBy('created_at', 'desc')->paginate(15);

        // Registra os dados das máquinas (caso necessário)
        $this->logMachineData($machines);

        // Retorna a view com os dados paginados
        return view('pages.machinesCadastradas', compact('machines'));
    }
    public function destroy($id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();

        return redirect()->route('machines.index');
    }

    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        return view('pages.edit_machine', compact('machine'));
    }

    public function update(Request $request, $id)
    {
        $machine = Machine::findOrFail($id);

        $validated = $request->validate([
            'Codigo_Maquina' => 'required|integer',
            'Fabricante' => 'required|string|max:255',
            'Descrição' => 'required|string|max:255',
            'Cidade' => 'required|string|max:255',
        ]);

        $geocodeResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $validated['Cidade'],
            'limit' => 1,
            'appid' => env('OPENWEATHERMAP_API_KEY'),
        ]);

        $geocodeData = $geocodeResponse->json();
        if (count($geocodeData) > 0) {
            $lat = $geocodeData[0]['lat'];
            $lon = $geocodeData[0]['lon'];
            $weatherData = $this->weatherService->getWeather($lat, $lon);

            if (isset($weatherData['main']['temp'])) {
                $validated['Temperatura'] = $weatherData['main']['temp'];
                $validated['Eficiencia'] = $this->calculateEfficiency($validated['Temperatura']);
            }
        }

        $machine->update($validated);

        return redirect()->route('machines.index');
    }

    private function calculateEfficiency($temperature)
    {
        if ($temperature >= 28) {
            return 100;
        } elseif ($temperature <= 24) {
            return 75;
        } else {
            return 75 + (($temperature - 24) * (100 - 75) / (28 - 24));
        }
    }

    private function logMachineData($machines)
    {
        foreach ($machines as $machine) {
            MachineLog::create([
                'created_at' => now(),
                'temperatura' => $machine->Temperatura,
                'eficiencia' => $machine->Eficiencia,
            ]);
        }
    }

    public function updateTemperature($id)
    {
        $machine = Machine::findOrFail($id);

        $geocodeResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $machine->Cidade,
            'limit' => 1,
            'appid' => env('OPENWEATHERMAP_API_KEY'),
        ]);

        $geocodeData = $geocodeResponse->json();
        if (count($geocodeData) > 0) {
            $lat = $geocodeData[0]['lat'];
            $lon = $geocodeData[0]['lon'];
            $weatherData = $this->weatherService->getWeather($lat, $lon);

            if (isset($weatherData['main']['temp'])) {
                $machine->Temperatura = $weatherData['main']['temp'];
                $machine->Eficiencia = $this->calculateEfficiency($machine->Temperatura);
                $machine->save();
            }
        }

        return redirect()->route('machines.index')->with('success', 'Temperatura atualizada com sucesso!');
    }

    public function updateAllTemperatures()
{
    $machines = Machine::all();

    foreach ($machines as $machine) {
        $geocodeResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $machine->Cidade,
            'limit' => 1,
            'appid' => env('OPENWEATHERMAP_API_KEY'),
        ]);

        $geocodeData = $geocodeResponse->json();
        if (count($geocodeData) > 0) {
            $lat = $geocodeData[0]['lat'];
            $lon = $geocodeData[0]['lon'];
            $weatherData = $this->weatherService->getWeather($lat, $lon);

            if (isset($weatherData['main']['temp'])) {
                $machine->Temperatura = $weatherData['main']['temp'];
                $machine->Eficiencia = $this->calculateEfficiency($machine->Temperatura);
                $machine->save();
            }
        }
    }

    return response()->json(['success' => 'Temperaturas de todas as máquinas atualizadas com sucesso!']);
}


}
