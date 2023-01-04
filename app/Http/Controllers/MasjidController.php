<?php

namespace App\Http\Controllers;

use App\Models\Masjid;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $masjid = Masjid::cari(request(['search']))->orderBy('nama')->paginate(10)->withQueryString();
        $search = $request->search;
        return view('admin.masjid.index-masjid')->with(compact('masjid', 'search'));
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

        $save = new Masjid;

        $save->nama = $request->input('nama');

        $save->save();

        return redirect()->back()->with('message', 'Masjid (' . $save->nama . ') Telah Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function show(Masjid $masjid)
    {
        $portofolio = Portofolio::with('masjids')->where('masjid_id', $masjid->id)->orderByDesc('tgl_awal')->orderByDesc('tgl_akhir')->paginate(10);
        return view('admin.masjid.show-masjid')->with(compact('masjid', 'portofolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function edit(Masjid $masjid)
    {
        $item = Masjid::where('slug', $masjid->slug)->first();
        return view('admin.masjid.edit-masjid')->with(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|min:3'
        ]);

        $save = Masjid::findorfail($id);

        $save->nama = $request->input('nama');
        $save->slug = Str::slug('');

        $save->save();

        return redirect('/admin/masjid')->with('message', 'Masjid (' . $save->nama . ') Telah Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masjid  $masjid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Masjid::findorfail($id);

        Masjid::destroy($id);

        return redirect()->back()->with('message', 'Masjid (' . $save->nama . ') Telah Dihapus');
    }
}
