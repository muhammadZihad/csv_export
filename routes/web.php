<?php

use App\Services\CsvImport\CsvGeneratorService;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/export-csv', function () {
    Student::query()
    ->join('departments', 'departments.id', 'students.department_id')
    ->join('departments', 'departments.id', 'students.department_id')
    $csvService = (new CsvGeneratorService())->insertColumns();
});
