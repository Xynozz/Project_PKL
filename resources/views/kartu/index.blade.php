@extends('layouts.frontend.admin')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kartu /</span> Index</h4>
    <div class="card">
        <h6 class="card-header">Data Kartu
            <a href="{{route('kartu.create')}}" class="btn btn-sm btn-primary" style="float: right">Tambah</a>
        </h6>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kartu</th>
                            <th>Nomor</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @php $no = 1; @endphp
                    @foreach ($kartu as $item)
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->nama_kartu}}</td>
                            <td>{{$item->nomor}}</td>
                            <td>{{$item->total}}</td>
                            <td>
                                <form action="{{route('kartu.destroy',$item->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route('kartu.edit',$item->id)}}" class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                    {{-- <a href="{{route('kartu.show',$item->id)}}" class="btn btn-sm btn-warning">
                                        Show
                                    </a> --}}

                                    <a href="{{route('kartu.destroy',$item->id)}}" class="btn btn-sm btn-danger" type="submit"
                                        data-confirm-delete="true">
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
</div>
@endsection
@push('scripts')
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#example');
</script>
@endpush
