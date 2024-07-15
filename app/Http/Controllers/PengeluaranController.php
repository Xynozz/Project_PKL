<?php

namespace App\Http\Controllers;

// use Alert;
use App\Models\Kartu;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::latest()->get();
        $kartu = Kartu::all();
        confirmDelete('delete', 'Apakah Anda Yakin?');

        return view('pengeluaran.index', compact('pengeluaran', 'kartu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartu = Kartu::all();
        $pengeluaran = Pengeluaran::all();

        return view('pengeluaran.create', compact('kartu', 'pengeluaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'jumlah_pengeluaran' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required',
        ]);

        $pengeluaran = new Pengeluaran();
        $pengeluaran->jumlah_pengeluaran = $request->jumlah_pengeluaran;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->id_kartu = $request->id_kartu;

        $kartu = Kartu::find($request->id_kartu);
        $kartu->total -= $request->jumlah_pengeluaran;
        $kartu->save();

        Alert::success('Success ', 'data berhasil ditambahkan')->autoClose(2000);
        $pengeluaran->save();
        return redirect()->route('home')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $kartu = Kartu::all();

        return view('pengeluaran.edit', compact('pengeluaran', 'kartu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pengeluaran' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $kartu = $pengeluaran->kartu;
        $kartu->total = $kartu->total + $pengeluaran->jumlah_pengeluaran - $request->jumlah_pengeluaran;
        $kartu->save();

        $pengeluaran->update($request->all());
        Alert::success('Success ', 'data berhasil diubah')->autoClose(2000);

        $pengeluaran->save();
        return redirect()->route('pengeluaran.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $kartu = $pengeluaran->kartu;
        $kartu->total += $pengeluaran->jumlah_pengeluaran;
        $kartu->save();
        $pengeluaran->delete();
        Alert::success('Success ', 'data berhasil dihapus')->autoClose(2000);

        return redirect()->route('pengeluaran.index');
    }
}
