@extends('layouts.frontend.user')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('pengeluaran.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="" class="form-label">Jumlah Pengeluaran</label>
                                    <input type="number"
                                        class="form-control @error('jumlah_pengeluaran') is-invalid @enderror"
                                        name="jumlah_pengeluaran" placeholder="Masukan Jumlah Pemasukan">
                                    @error('jumlah_pengeluaran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="deskripsi" placeholder="Masukan deskripsi">
                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label">Id Kartu</label>
                                    <select name="id_kartu"
                                        class="form-control @error('id_kartu') is-invalid @enderror">
                                        <option class="form-control" selected disabled>Pilih Kartu</option>
                                        @foreach ($kartu as $item)
                                        <option class="form-control" value="{{$item->id}}">{{ $item->nama_kartu }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_kartu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <a class="btn btn-sm btn-primary" href="{{route('home')}}">
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
