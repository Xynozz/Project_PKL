<?php

namespace App\Http\Controllers;

use App\Models\Kartu;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kartu = Kartu::all();
        $pemasukan = Pemasukan::all();
        $pengeluaran = Pengeluaran::all();

        $saldo = Pemasukan::sum('jumlah_pemasukan') - Pengeluaran::sum('jumlah_pengeluaran');
        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $total_pengeluaran = Pengeluaran::sum('jumlah_pengeluaran');

        // Prepare data for chart
        $chartData = [
            'labels' => [],
            'pemasukan' => [],
            'pengeluaran' => [],
        ];

        foreach ($pemasukan as $p) {
            $chartData['labels'][] = $p->created_at->format('Y-m-d');
            $chartData['pemasukan'][] = $p->jumlah_pemasukan;
        }

        foreach ($pengeluaran as $p) {
            $chartData['labels'][] = $p->created_at->format('Y-m-d');
            $chartData['pengeluaran'][] = $p->jumlah_pengeluaran;
        }

        confirmDelete('delete', 'Apakah Anda Yakin?');

        return view('home', ['kartu' => $kartu, 'pemasukan' => $pemasukan, 'pengeluaran' => $pengeluaran, 'saldo' => $saldo,
            'total_pemasukan' => $total_pemasukan, 'total_pengeluaran' => $total_pengeluaran, 'chartData' => $chartData]);

    }
}
