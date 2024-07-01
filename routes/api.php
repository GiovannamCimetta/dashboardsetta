<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Models\Machine;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/weather', [WeatherController::class, 'showWeather']);


// Rota para buscar os dados da máquina
// Route::get('/machine-data', function () {
//     $machines = Machine::all();
//     $data = [
//        'last_update' => now()->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
//         'last_temperature' => $machines->last()->Temperatura ?? 0,
//         'last_efficiency' => $machines->last()->Eficiencia ?? 0,
//         'labels' => $machines->pluck('created_at')->toArray(),
//         'temperatures' => $machines->pluck('Temperatura')->toArray(),
//         'efficiencies' => $machines->pluck('Eficiencia')->toArray(),
//     ];
//     return response()->json($data);
// });


Route::get('/machine-data', function () {
    $machines = Machine::all();
    $data = [
        'last_update' => now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i'),
        'last_temperature' => $machines->last()->Temperatura ?? 0,
        'last_efficiency' => $machines->last()->Eficiencia ?? 0,
        'labels' => $machines->pluck('Temperatura' )->toArray(),
        'temperatures' => $machines->pluck('Temperatura')->toArray(),
       'labels1' => $machines->map(function ($machine) {
    return [
        $machine->Temperatura . '°C',
        $machine->created_at->format('d/m/Y H:i'),


    ];
})->toArray(),
        'efficiencies' => $machines->pluck('Eficiencia')->toArray(),
        'machines' => $machines->map(function ($machine) {
            return [
                'Fabricante' => $machine->Fabricante,
                'Codigo_Maquina' => $machine->Codigo_Maquina,
                'Cidade' => $machine->Cidade,
                'temperatures' => $machine->Temperatura,
                'Eficiencia' => $machine->Eficiencia
            ];
        })->toArray()
    ];
    return response()->json($data);
});

// Route::get('/api/machine-data', function () {
//     $machines = Machine::all();
//     $data1 = [
//         'last_update' => now()->format('Y-m-d H:i:s'),
//         'last_temperature' => $machines->last()->Temperatura,
//         'last_efficiency' => $machines->last()->Eficiencia,
//         'labels' => $machines->pluck('created_at')->toArray(),
//         'temperatures' => $machines->pluck('Temperatura')->toArray(),
//         'efficiencies' => $machines->pluck('Eficiencia')->toArray(),
//     ];
//     return response()->json($data1);
// });
