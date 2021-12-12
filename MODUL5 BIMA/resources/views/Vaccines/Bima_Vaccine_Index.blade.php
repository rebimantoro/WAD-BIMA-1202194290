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

    @if(count($Vaccine)===0)
    <div class="container justify-content-center">
        <br>
        <p align="center" class="text-secondary">There is no data..</p>
        <p align="center"><a  href="{{ route('Bima_Vaccine.Create.Index') }}" class="btn btn-primary "> Add Vaccine</a></p>
    </div>
    @else 
        <div class="container justify-content-center">
        <br>
        <h3 align="center" class="text-dark">List Vaksin</h3>
        <br>
        <a  href="{{ route('Bima_Vaccine.Create.Index') }}" class="btn btn-primary mb-3 "> Add Vaccine</a>
        <table class="table table-primary table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            $i=1;
            ?>
            @foreach($Vaccine as $Vaccine)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $Vaccine -> name }}</td>
                <td>Rp.{{ $Vaccine -> price}}</td>
                <td><a href="{{ route('Bima_Vaccine.Update.Index',$Vaccine->id)}}" class="btn btn-warning me-2">Edit</a>
                    <a href="{{ route('Bima_Vaccine.Delete',$Vaccine->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
            $i=$i+1;
            ?>
            @endforeach
        </table>    
        </div>
    @endif

@endsection