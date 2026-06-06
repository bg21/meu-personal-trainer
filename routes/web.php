<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\StudentsList;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/alunos', StudentsList::class)->name('students.index');
