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
    <div class="container">
        <br><br>
        <div class="row">
            @foreach($Vaccine as $Vaccine)
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/upload/'.$Vaccine->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $Vaccine->name }}</h5>
                      <p class="card-text text-secondary">Rp.{{ $Vaccine->price }}</p>
                      <p class="card-text">{{ $Vaccine->description }}</p>
                      <a href="{{ route('Bima_Patient.Create.Index',$Vaccine->id) }}" class="btn btn-primary" style="width:250px" >Vaccine Now</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection