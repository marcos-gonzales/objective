<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ApplicantController::class, 'index']);
Route::get('/hi', function() {
  return view('index');
});