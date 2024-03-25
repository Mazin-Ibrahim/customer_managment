<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('customers.index');
});


Route::prefix('customers')->group(function(){
    Route::get('/',[CustomerController::class,'index'])->name('customers.index');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/store',[CustomerController::class,'store'])->name('customers.store');
    Route::get('/{customer}/edit',[CustomerController::class,'edit'])->name('customers.edit');
    Route::put('/{customer}/update',[CustomerController::class,'update'])->name('customers.update');
    Route::delete('/{customer}/delete',[CustomerController::class,'delete'])->name('customers.delete');
});
