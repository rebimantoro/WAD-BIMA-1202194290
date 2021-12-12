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
    @if(count($Patient)===0)
    <div class="container justify-content-center">
        <br>
        <p align="center" class="text-secondary">There is no data..</p>
        <p align="center"><a  href="/Bima_Patient/Vaccine" class="btn btn-primary "> Add Patient</a></p>
    </div>
    @else 
    <div class="container justify-content-center">
        <br>
        <h3 align="center" class="text-dark">List Patient</h3>
        <br>
        <a  href="#" class="btn btn-primary mb-3 "> Add Patient</a>
        <table class="table table-primary table-striped">
            <tr>
                <th>No</th>
                <th>Vaccine</th>
                <th>Name</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Action</th>
            </tr>
            <?php $i=1; ?>
            @foreach($Patient as $Patient)
            <tr>
                <td>{{ $i }}</td>
                @foreach($Vaccine as $Vaccine)
                    @if($Vaccine->id === $Patient->vaccine_id)
                    <td>{{ $Vaccine->name }}</td>
                    @endif
                @endforeach
                <td>{{ $Patient->name }}</td>
                <td>{{ $Patient->nik }}</td>
                <td>{{ $Patient->alamat }}</td>
                <td>{{ $Patient->no_hp }}</td>
                <td><a href="{{ route('Bima_Patient.Update.Index',$Patient->id)}}" class="btn btn-warning me-2">Edit</a>
                    <a href="{{ route('Bima_Patient.Delete',$Patient->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php $i=$i+1; ?>
            @endforeach
        </table>    
        </div>
    @endif
@endsection