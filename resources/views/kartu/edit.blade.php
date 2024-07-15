@extends('layouts.frontend.admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kartu /</span> Edit</h4>
    <div class="col-md-12">
        <div class="card">
            <h6 class="card-header">Data Kartu
                <a href="{{route('kartu.index')}}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
            </h6>
            <div class="card-body">
                <form action="{{route('kartu.update', $kartu->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Kartu</label>
                                <input type="text" class="form-control @error('nama_kartu') is-invalid @enderror"
                                    name="nama_kartu" placeholder="Masukan Kartu" value="{{ $kartu->nama_kartu }}">
                                @error('nama_kartu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nomor</label>
                                <input type="number" class="form-control @error('nomor') is-invalid @enderror"
                                    name="nomor" placeholder="Masukan Nomor" value="{{ $kartu->nomor }}">
                                @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">total</label>
                                <input type="number" class="form-control @error('total') is-invalid @enderror"
                                    name="total" placeholder="Masukan total (Optional)" value="{{ $kartu->total }}">
                                @error('total')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <button class="btn btn-sm btn-success" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
