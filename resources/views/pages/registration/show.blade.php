@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3"></div>
    <div class="col-md-6 col-sm-6 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Registration<small>New registration</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="card">
                    <div class="card-body">

                        <!-- Card Header -->
                        <div class="card-title">
                            <h4 class="modal-title w-100 text-center">Detail Pendaftaran</h4>
                        </div>

                        <!-- Card body -->
                        <div class="card-text">
                            <h3>Selamat Anda Mendapatkan Nomor Urut</h3>
                            <h1>{{$registration->number}}</h1>
                            <h3>Tanggal Kunjungan</h3>
                            <h3>{{$registration->checkupDate}}</h3>
                            <h4>Nama Pasien : {{$registration->patient->name}}</h4>
                            <h4>Nama Pasien : {{$registration->doctor->name}}</h4>
                            <a class="btn btn-primary" href="{{route('registration.index')}}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
