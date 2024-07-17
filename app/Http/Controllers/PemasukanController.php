<?php

namespace App\Http\Controllers;

// use Alert;
use App\Http\Middleware\IsAdmin;
use App\Models\Kartu;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
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
        $pemasukan = Pemasukan::Latest()->get();
        $kartu = Kartu::all();
        confirmDelete('delete', 'Apakah Anda Yakin?');

        return view('pemasukan.index', compact('pemasukan', 'kartu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasukan = Pemasukan::all();
        $kartu = Kartu::all();

        return view('user.pemasukan.create', compact('pemasukan', 'kartu'));

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
            'jumlah_pemasukan' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required|nullable',
        ]);

        $pemasukan = new Pemasukan();
        $pemasukan->jumlah_pemasukan = $request->jumlah_pemasukan;
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->id_kartu = $request->id_kartu;

        $kartu = Kartu::find($request->id_kartu);
        $kartu->total += $request->jumlah_pemasukan;
        $kartu->save();
        Alert::success('Success ', 'data berhasil ditambahkan')->autoClose(2000);

        $pemasukan->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $kartu = Kartu::all();
        return view('pemasukan.edit', compact('pemasukan', 'kartu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pemasukan' => 'required',
            'deskripsi' => 'required',
            'id_kartu' => 'required',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $kartu = $pemasukan->kartu;
        $kartu->total = $kartu->total - $pemasukan->jumlah_pemasukan + $request->jumlah_pemasukan;
        $kartu->save();

        $pemasukan->update($request->all());
        Alert::success('Success ', 'data berhasil diubah')->autoClose(2000);

        $pemasukan->save();
        return redirect()->route('pemasukan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $kartu = $pemasukan -> kartu;
        $kartu->total -= $pemasukan -> jumlah_pemasukan;
        $kartu->save();
        $pemasukan->delete();
        Alert::success('Success ', 'data berhasil dihapus')->autoClose(2000);

        return redirect()->route('pemasukan.index');
    }
}
