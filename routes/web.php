<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Login::class);

// TODO: Quando usuário não estiver logado ir para login
Route::group(['middleware' => 'auth'], function () {
    Route::get('/fornecedores', \App\Livewire\SuppliersList::class);
    Route::get('/estoque', \App\Livewire\VehiclesList::class);
    Route::get('/importar', \App\Livewire\ImportVehicles::class);
});
