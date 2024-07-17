@extends('layouts.frontend.user')
@section('content')
<div class="container-fluid py-4">
    <div class="row mb-3">
        {{-- <div class="col-lg-6">
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row mt-3">
                                <div class="col-6 px-4">
                                    <h4><b>Dompet Anda</b></h4>
                                </div>
                                <div class="col-6 px-3 text-end">
                                    <a class="btn bg-gradient-dark" href="{{ route('kartu.create') }}"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Dompet</a>
                                </div>
                            </div>
                        </div>
                        @foreach ($kartu as $item)
                        <div class="col me-auto mb-2 px-3">
                            <div class="card bg-transparent shadow-xl">
                                <div class="overflow-hidden position-relative border-radius-xl"
                                    style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="card-body position-relative z-index-1 p-3">
                                        <div class="row">
                                            <div class="col">
                                                <p class="text-white text-sm opacity-8">Nomor</p>
                                                <h6 class="text-white mb-5">{{ $item->nomor }}</h6>
                                            </div>
                                            <div class="col text-end">
                                                <form action="{{route('kartu.destroy',$item->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{route('kartu.destroy',$item->id)}}"
                                                        class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                        type="submit" data-confirm-delete="true">
                                                        <i class="far fa-trash-alt me-2"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <p class="text-white text-sm opacity-8 mb-0">Nama Dompet</p>
                                                    <h6 class="text-white mb-1">{{ $item->nama_kartu }}</h6>
                                                </div>
                                                <div>
                                                    <p class="text-white text-sm opacity-8 mb-0">Saldo</p>
                                                    <h6 class="text-white mb-0">Rp {{ $item->total }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 mb-2">
                            <div class="row mt-3">
                                <div class="col-6 px-4">
                                    <h5>Total Saldo</h5>
                                    <h4><b>Rp {{ $saldo }}</b></h4>
                                </div>
                                <div class="col-3 text-center">
                                    <a class="btn bg-gradient-success"
                                        href="{{ route('pemasukan.create') }}">Pemasukan</a>
                                </div>
                                <div class="col-3 text-center">
                                    <a class="btn bg-gradient-warning"
                                        href="{{ route('pengeluaran.create') }}">Pengeluaran</a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-3 px-4 mt-2">
                                    <h5>Pemasukan</h5>
                                    <h4><b>Rp {{ $total_pemasukan }}</b></h4>
                                </div>
                                <div class="col-3 px-4 mt-2">
                                    <h5>pengeluaran</h5>
                                    <h4><b>Rp {{ $total_pengeluaran }}</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="row">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><b>Dompetku</b></h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <a class="btn bg-gradient-dark" href="{{ route('kartu.create') }}"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Tambah
                                    Dompet
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($kartu as $item)
                                <div class="col me-auto mb-2 px-3">
                                    <div class="card bg-transparent shadow-xl">
                                        <div class="overflow-hidden position-relative border-radius-xl"
                                            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                            <span class="mask bg-gradient-dark"></span>
                                            <div class="card-body position-relative z-index-1 p-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-white text-sm opacity-8">Nomor</p>
                                                        <h6 class="text-white mb-5">{{ $item->nomor }}</h6>
                                                    </div>
                                                    <div class="col text-end">
                                                        <form action="{{route('kartu.destroy',$item->id)}}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="{{route('kartu.destroy',$item->id)}}"
                                                                class="btn btn-link text-danger text-gradient px-2 mb-0"
                                                                type="submit" data-confirm-delete="true">
                                                                <i class="far fa-trash-alt me-2"></i>
                                                            </a>
                                                            <a href="{{route('kartu.edit',$item->id)}}"
                                                                class="btn btn-link text-info text-gradient px-2 mb-0">
                                                                <i class="far fa-edit me-2"></i>
                                                            </a>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <div class="me-4">
                                                            <p class="text-white text-sm opacity-8 mb-0">Nama Dompet</p>
                                                            <h6 class="text-white mb-1">{{ $item->nama_kartu }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Total Saldo</h6>
                                        <h5><b>@currency($saldo)</b></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn bg-gradient-success"
                                            href="{{ route('pemasukan.create') }}">Pemasukan</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn bg-gradient-warning"
                                            href="{{ route('pengeluaran.create') }}">Pengeluaran</a>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <h6>Pemasukan</h6>
                                        <h5><b>@currency($total_pemasukan)</b></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>Pengeluaran</h6>
                                        <h5><b>@currency($total_pengeluaran)</b></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4><b>Statistik</b></h4>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="myChart" height="180px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4><b>Riwayat</b></h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kartu</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kategori</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {{ json_encode($chartData['labels']) }},
                    datasets: [{
                        label: 'Pemasukan',
                        data: {{ json_encode($chartData['pemasukan']) }},
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Pengeluaran',
                        data: {{ json_encode($chartData['pengeluaran']) }},
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
</script>
@endsection
