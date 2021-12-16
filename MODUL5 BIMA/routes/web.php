<?php

// use
// use
use Illuminate\Support\Facades\Route;


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
    return view('Bima_Home');
});


#CRUD VACCINE
Route::get('/Bima_Vaccine', [VaccineController::class, 'index'])->name('Bima_Vaccine_Index');
Route::get('/Bima_Vaccine/Create', [VaccineController::class, 'add'])->name('Bima_Vaccine.Create.Index');
Route::post('/Bima_Vaccine/Create', [VaccineController::class, 'addVaccine'])->name('Bima_Vaccine.Create');
Route::get('/Bima_Vaccine/Update/{id}', [VaccineController::class, 'update'])->name('Bima_Vaccine.Update.Index');
Route::post('/Bima_Vaccine/Update/{id}', [VaccineController::class, 'updateVaccine'])->name('Bima_Vaccine.Update');
Route::get('/Bima_Vaccine/Delete/{id}', [VaccineController::class, 'deleteVaccine'])->name('Bima_Vaccine.Delete');
#END OF CRUD VACCINE

#CRUD PATIENT
Route::get('/Bima_Patient', [PatientController::class, 'index'])->name('Bima_Patient_Index');
Route::get('/Bima_Patient/Vaccine', [PatientController::class, 'indexVaccine'])->name('Bima_Patient_Vaccine');
Route::get('/Bima_Patient/Vaccine/Create/{id}', [PatientController::class, 'add'])->name('Bima_Patient.Create.Index');
Route::post('/Bima_Patient/Vaccine/Create/{id}', [PatientController::class, 'addPatient'])->name('Bima_Patient.Create');
Route::get('/Bima_Patient/Update/{id}', [PatientController::class, 'update'])->name('Bima_Patient.Update.Index');
Route::post('/Bima_Patient/Update/{id}', [PatientController::class, 'updatePatient'])->name('Bima_Patient.Update');
Route::get('/Bima_Patient/Delete/{id}', [PatientController::class, 'deletePatient'])->name('Bima_Patient.Delete');
#END OF CRUD PATIENT