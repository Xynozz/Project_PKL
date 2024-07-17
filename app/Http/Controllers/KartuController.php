<?php

namespace App\Http\Controllers;

// Use Alert;
use App\Http\Middleware\IsAdmin;
use App\Models\Kartu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KartuController extends Controller
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
        $kartu = Kartu::latest()->get();
        confirmDelete('delete', 'Apakah Anda Yakin?');

        return view('home', compact('kartu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartu = Kartu::all();
        return view('user.kartu.create', compact('kartu'));
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
            'nama_kartu' => 'nullable|required',
            'nomor' => 'nullable|min:11',
            'total' => 'min:0|nullable',
        ]);

        $kartu = new Kartu();
        $kartu->nama_kartu = $request->nama_kartu;
        $kartu->nomor = $request->nomor;
        $kartu->total = $request->total;
        $kartu->save();
        Alert::success('Success ', 'data berhasil ditambahkan')->autoClose(2000);

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartu = Kartu::findOrFail($id);
        return view('kartu.show', compact('kartu'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kartu = Kartu::findOrFail($id);
        return view('user.kartu.edit', compact('kartu'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_kartu' => 'nullable|required',
            'nomor' => 'nullable|min:11',
            'total' => 'integer|min:0|nullable',
        ]);

        $kartu = Kartu::findOrFail($id);
        $kartu->nama_kartu = $request->nama_kartu;
        $kartu->total = $request->total;
        $kartu->nomor = $request->nomor;
        $kartu->save();
        Alert::success('Success ', 'data berhasil diubah')->autoClose(2000);

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kartu  $kartu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartu = Kartu::findOrFail($id);
        $kartu->delete();
        Alert::success('Success ', 'data berhasil dihapus')->autoClose(2000);

        return redirect()->route('home');

    }
}
