<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Patient;
use App\models\Vaccine;

class PatientController extends Controller
{
    public function index()
    {
        $Patient = Patient::all();
        $Vaccine = Vaccine::all();
        return view('Patients.Bima_Patient_Index', compact('Patient', 'Vaccine'));
    }

    public function indexVaccine()
    {
        $Vaccine = Vaccine::all();
        return view('Patients.Bima_Patient_Vaccine', compact('Vaccine'));
    }

    public function add($id)
    {
        $Vaccine = Vaccine::find($id);
        return view('Patients.Bima_Patient_Create', compact('Vaccine'));
    }

    public function addPatient($id, Request $request)
    {
        $Patient = new Patient();
        $Patient->vaccine_id = $id;
        $Patient->name = $request->name;
        $Patient->nik = $request->nik;
        $Patient->alamat = $request->alamat;
        $img_ktp = time() . '.' . $request->img_ktp->extension();
        $request->img_ktp->move(public_path('images/upload'), $img_ktp);
        $Patient->img_ktp = $img_ktp;
        $Patient->no_hp = $request->no_hp;
        $Patient->save();

        return redirect(route('Bima_Patient_Index'));
    }

    public function update($id)
    {
        $Patient = Patient::find($id);
        $Vaccine = Vaccine::all();
        return view('Patients.Bima_Patient_Update', compact('Patient', 'Vaccine'));
    }

    public function updatePatient($id, Request $request)
    {

        $Patient = Patient::find($id);
        $Patient->name = $request->name;
        $Patient->nik = $request->nik;
        $Patient->alamat = $request->alamat;
        $img_ktp = time() . '.' . $request->img_ktp->extension();
        $request->img_ktp->move(public_path('images/upload'), $img_ktp);
        $Patient->img_ktp = $img_ktp;
        $Patient->no_hp = $request->no_hp;
        $Patient->save();

        return redirect(route('Bima_Patient_Index'));
    }

    public function deletePatient($id)
    {
        $Patient = Patient::find($id);
        $Patient->delete();
        return redirect(route('Bima_Patient_Index'));
    }
}
