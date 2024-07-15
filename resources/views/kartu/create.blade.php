@extends('layouts.frontend.user')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kartu.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="" class="form-label">Nama Kartu</label>
                                    <input type="text" class="form-control @error('nama_kartu') is-invalid @enderror"
                                        name="nama_kartu" placeholder="Masukan Kartu">
                                    @error('nama_kartu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Nomor</label>
                                    <input type="number" class="form-control @error('nomor') is-invalid @enderror"
                                        name="nomor" placeholder="Masukan Nomor">
                                    @error('nomor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="" class="form-label">total</label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror"
                                        name="total" placeholder="Masukan total (Optional)">
                                    @error('total')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}

                                <div class="mt-2">
                                    <a class="btn btn-sm btn-primary"  href="{{route('home')}}">
                                        Kembali
                                    </a>
                                    <button class="btn btn-sm btn-success" type="submit">
                                        Simpan
                                    </button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
