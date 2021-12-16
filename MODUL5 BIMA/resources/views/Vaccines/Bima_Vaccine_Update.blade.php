@extends('Bima_Master');
@section('home')
text-secondary
@endsection
@section('vaccine')
text-dark
@endsection
@section('patient')
text-secondary
@endsection
@section('judulHalaman')
Bima_Vaccine
@endsection

@section('isiKonten')
<div class="container justify-content-center">
    <br><br>
    <h3 align="center">Edit Vaccine</h3>
    <form action="{{ route('Bima_Vaccine.Update',$Vaccine->id) }}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Vaccine Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $Vaccine->name }}" required>
        </div>
        <label for="price" class="form-label">Price</label><br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">RP</span>
            <input type="number" class="form-control" id="price" name="price" value="{{ $Vaccine->price }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px" required>{{ $Vaccine->description }}</textarea>
        </div>
        <label for="image" class="form-label">Image</label>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit"class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection