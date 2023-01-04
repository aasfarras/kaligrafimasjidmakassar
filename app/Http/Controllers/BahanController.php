<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bahan = Bahan::cari(request(['search']))->orderBy('nama')->paginate(10)->withQueryString();
        $search = $request->search;
        return view('admin.bahan.index-bahan')->with(compact('bahan', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|min:3'
        ]);

        $save = new Bahan;

        $save->nama = $request->input('nama');

        $save->save();

        return redirect()->back()->with('message', 'Alat dan Bahan (' . $save->nama . ') Telah Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        $portofolio = Portofolio::with('bahans')->where('bahan_id', $bahan->id)->orderByDesc('tgl_awal')->orderByDesc('tgl_akhir')->paginate(10);
        return view('admin.bahan.show-bahan')->with(compact('bahan', 'portofolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahan $bahan)
    {
        $item = Bahan::where('slug', $bahan->slug)->first();
        return view('admin.bahan.edit-bahan')->with(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|min:3'
        ]);

        $save = Bahan::findorfail($id);

        $save->nama = $request->input('nama');
        $save->slug = Str::slug('');

        $save->save();

        return redirect('/admin/bahan')->with('message', 'Alat dan Bahan (' . $save->nama . ') Telah Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Bahan::findorfail($id);

        Bahan::destroy($id);

        return redirect()->back()->with('message', 'Alat dan Bahan (' . $save->nama . ') Telah Dihapus');
    }
}
