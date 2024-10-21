<?php
use App\Http\Controllers\StocksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home');});

// Menetapkan prefiks "/stock" untuk semua rute yang didefinisikan dalam grup ini. Artinya, semua URL yang didefinisikan dalam grup ini akan diawali dengan "/stock".
    
    Route::get('/membuat',[StocksController::class,'create'])->name('membuat');
    Route::get('/edit/{id}',[StocksController::class,'edit'])->name('edit');
    Route::patch('/update/{id}',[StocksController::class,'update'])->name('update');
    Route::post('/membuat',[StocksController::class,'store'])->name('membuat.toko');
    Route::delete('/destroy/{id}',[StocksController::class,'destroy'])->name('destroy');
    Route::get('/stock', [StocksController::class,'index'])->name('stock');

