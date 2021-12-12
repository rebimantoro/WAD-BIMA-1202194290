@extends('Bima_Master');
@section('home')
text-dark
@endsection
@section('vaccine')
text-secondary
@endsection
@section('patient')
text-secondary
@endsection
@section('judulHalaman')
Bima_Vaccine
@endsection

@section('isiKonten')
<br><br>
<h1 align="center">About US</h1>
<div class ="container mt-4">
    <div class="row justify-content-center">
        <div class="col-1"></div>
        <div class="col-4"><img src="{{asset('images/medic.png')}}" width="400" alt="Medic Picture"></div>
        <div class="col-1"></div>
        <div class="col-5">
            <br><br><br>
            Vaksin dibuat untuk mencegah penyakit. Vaksin COVID-19 adalah harapan terbaik untuk menekan
            penularan virus corona. Mendapatkan vaksin COVID-19 maka bisa melindungi tubuh dengan
            menciptakan respons antibodi di tubuh tanpa harus sakit karena virus corona. Vaksin COVID-19 mampu
            mencegah seseorang terkena virus corona. Atau, apabila kamu tertular COVID-19, vaksin dapat mencegah
            tubuh dari sakit parah atau potensi hadirnya komplikasi serius. Dengan mendapatkan vaksin, kamu juga
            akan membantu melindungi orang-orang di sekitar dari virus corona. Terutama orang-orang yang
            berisiko tinggi terkena penyakit parah akibat COVID-19.
        </div>
        <div class="col-1"></div>
    </div>
</div>
@endsection