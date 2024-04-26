<?php

use App\Http\Presentation\Controllers\TotalCnaeConsumeController;
use Illuminate\Support\Facades\Route;

Route::get('/total-cnae-consume-data/get', [TotalCnaeConsumeController::class, 'index']);

Route::get('/', function () {
    return view('total-cnae-consume-charts-page');
});
