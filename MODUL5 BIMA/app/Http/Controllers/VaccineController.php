<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccine;

class VaccineController extends Controller
{
    public function add()
    {
        return view('Vaccines.Bima_Vaccine_Create');
    }

    public function addVaccine(Request $request)
    {
        $Vaccine = new Vaccine();
        $Vaccine->name = $request->name;
        $Vaccine->price = $request->price;
        $Vaccine->description = $request->description;
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/upload'), $image);
        $Vaccine->image = $image;
        $Vaccine->save();

        return redirect(route('Bima_Vaccine_Index'));
    }

    public function index()
    {
        $Vaccine = Vaccine::all();
        return view('Vaccines.Bima_Vaccine_Index', compact('Vaccine'));
    }

    public function update($index)
    {
        $Vaccine = Vaccine::find($index);
        return view('Vaccines.Bima_Vaccine_Update', compact('Vaccine'));
    }

    public function updateVaccine($id, Request $request)
    {
        $Vaccine = Vaccine::all();
        $Vaccine = $Vaccine->find($id);
        $Vaccine->name = $request->name;
        $Vaccine->price = $request->price;
        $Vaccine->description = $request->description;
        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/upload'), $image);
        $Vaccine->image = $image;
        $Vaccine->save();
        return redirect(route('Bima_Vaccine_Index'));
    }

    public function deleteVaccine($id)
    {
        $Vaccine = Vaccine::find($id);
        $Vaccine->delete();
        return redirect(route('Bima_Vaccine_Index'));
    }
}
