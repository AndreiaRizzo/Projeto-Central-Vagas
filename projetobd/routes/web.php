<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoControllerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categoria', CategoriaController::class);
    Route::resource('curso', CursoController::class); 
    Route::resource('aluno', AlunoController::class);  // Mover esta linha para cá
}); /*estão dentro do middleware auth, ou seja, elas só estarão disponíveis para usuários autenticados. 
Isso significa que qualquer operação relacionada à categoria exigirá que o usuário esteja logado.*/



require __DIR__ . '/auth.php';

