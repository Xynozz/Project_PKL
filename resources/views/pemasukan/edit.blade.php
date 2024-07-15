@extends('layouts.frontend.admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pemasukan /</span> Edit</h4>
    <div class="col-md-12">
        <div class="card">
            <h6 class="card-header">Data Pemasukan
                <a href="{{route('pemasukan.index')}}" class="btn btn-sm btn-primary" style="float: right">Kembali</a>
            </h6>
            <div class="card-body">
                <form action="{{route('pemasukan.update', $pemasukan->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for="" class="form-label">Jumlah Pemasukan</label>
                                <input type="number" value="{{ $pemasukan->jumlah_pemasukan }}"
                                    class="form-control @error('jumlah_pemasukan') is-invalid @enderror"
                                    name="jumlah_pemasukan" placeholder="Masukan Jumlah Pemasukan">
                                @error('jumlah_pemasukan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                    name="deskripsi" placeholder="Masukan deskripsi" value="{{ $pemasukan->deskripsi }}">
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Id Kartu</label>
                                <select name="id_kartu" class="form-control @error('id_kartu') is-invalid @enderror">
                                    <option class="form-control" selected disabled>Pilih Kartu</option>
                                    @foreach ($kartu as $item)
                                    <option class="form-control" value="{{ $item->id }}" {{ $item->id == $pemasukan->id_kartu ? 'selected' : '' }}>
                                        {{ $item->nama_kartu }}
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
