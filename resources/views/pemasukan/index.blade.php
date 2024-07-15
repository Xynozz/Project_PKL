@extends('layouts.frontend.user')
@section('content')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <div class="card border-secondary">
                <div class="card-header">Data kartu
                    <a href="{{route('kartu.create')}}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-reponsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kartu</th>
                                    <th>Jenis Kartu</th>
                                    <th>Nomor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @php $no = 1; @endphp
                            @foreach ($kartu as $item)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_kartu}}</td>
                                    <td>{{$item->jenis_kartu}}</td>
                                    <td>{{$item->nomor}}</td>
                                    <td>
                                        <form action="{{route('kartu.destroy',$item->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{route('kartu.edit',$item->id)}}" class="btn btn-sm btn-success">
                                                Edit
                                            </a>
                                            <a href="{{route('kartu.show',$item->id)}}" class="btn btn-sm btn-warning">
                                                Show
                                            </a>

                                            <button class="btn btn-sm btn-danger" type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pemasukan /</span> Index</h4>
    <div class="card">
        <h6 class="card-header">Data Pemasukan
            <a href="{{route('pemasukan.create')}}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
        </h6>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Pemasukan</th>
                        <th>Deskripsi</th>
                        <th>id Kartu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php $no = 1; @endphp
                @foreach ($pemasukan as $item)
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->jumlah_pemasukan}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>{{$item->kartu->nama_kartu}}</td>
                        <td>
                            <form action="{{route('pemasukan.destroy',$item->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('pemasukan.edit',$item->id)}}" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                                {{-- <a href="{{route('kartu.show',$item->id)}}" class="btn btn-sm btn-warning">
                                    Show
                                </a> --}}

                                <a href="{{route('pemasukan.destroy',$item->id)}}" class="btn btn-sm btn-danger" type="submit" data-confirm-delete="true">
                                    Delete
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endpush
