<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui você registra as rotas web para sua aplicação.
| Essas rotas são carregadas pelo RouteServiceProvider e
| todas elas serão atribuídas ao grupo "web".
|
*/

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Rotas CRUD para Cursos
Route::resource('courses', CourseController::class);

// Rotas CRUD para Alunos
Route::resource('students', StudentController::class);

