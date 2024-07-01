<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MaquinaController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/weather/teste', [WeatherController::class, 'showForm'])->name('showWeatherForm');
Route::post('/weather', [WeatherController::class, 'getWeatherByLocation'])->name('getWeatherByLocation');


Route::get('/machinesCadastradas', [MaquinaController::class, 'index'])->name('machines.index');
Route::get('/machines/create', [MaquinaController::class, 'create'])->name('machines.create');
Route::post('/machines', [MaquinaController::class, 'store'])->name('machines.store');
Route::delete('/machinesCadastradas/{id}', [MaquinaController::class, 'destroy'])->name('machines.destroy');
Route::get('/machinesCadastradas/{id}/edit', [MaquinaController::class, 'edit'])->name('machines.edit');
Route::put('/machinesCadastradas/{id}', [MaquinaController::class, 'update'])->name('machines.update');
Route::put('/machines/{id}/update-temperature', [MaquinaController::class, 'updateTemperature'])->name('machines.updateTemperature');
Route::put('/machines/update-all-temperatures', [MaquinaController::class, 'updateAllTemperatures'])->name('machines.updateAllTemperatures');
