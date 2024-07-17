@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Kartu
                    <a href="{{ route('kartu.index') }}" class="btn btn-sm btn-primary"
                        style="float: right">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="">Nama Kartu:</label>
                        <h3>{{$kartu->nama_kartu}}</h3>
                    </div>
                    <div class="mb-2">
                        <label for="">Jenis Kartu:</label>
                        <h3>{{$kartu->jenis_kartu}}</h3>
                    </div>
                    <div class="mb-2">
                        <label for="">nomor:</label>
                        <h3>{{$kartu->nomor}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
