@extends('Bima_Master');
@section('home')
text-secondary
@endsection
@section('vaccine')
text-secondary
@endsection
@section('patient')
text-dark
@endsection
@section('judulHalaman')
Bima_Patient
@endsection

@section('isiKonten')
<div class="container justify-content-center">
    <br><br>
    <h3 align="center">Register {{ $Vaccine->name }} Patient</h3>
    <form action="{{ route('Bima_Patient.Create',$Vaccine->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="vaccine_id" class="form-label">Vaccine ID</label>
            <input type="number" class="form-control" id="vaccine_id" name="name" value ="{{ $Vaccine->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Patient Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control" id="nik" name="nik" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <label for="img_ktp" class="form-label">KTP</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="img_ktp" name="img_ktp">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No Hp</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <button type="submit"class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection