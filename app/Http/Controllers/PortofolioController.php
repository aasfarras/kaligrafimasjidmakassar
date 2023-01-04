<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Bahan;
use App\Models\Masjid;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::orderBy('nama')->get();
        $masjid = Masjid::orderBy('nama')->get();
        return view('admin.dokumentasi.index-dokumentasi')->with(compact('bahan', 'masjid'));
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
            'bahan_id' => 'required',
            'masjid_id' => 'required',
            'ket' => 'required',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
            'gambar' => 'file|image|max:2048'
        ]);

        $bahan = Bahan::where('id', $request->bahan_id)->first();
        $masjid = Masjid::where('id', $request->masjid_id)->first();
        $foto = $request->gambar;
        $new_foto = time().' '.$bahan->nama.' '.$masjid->nama.'.jpg';
        Image::make($foto)->resize(500, 500)->save('foto/foto-dokumentasi/'.$new_foto, 100, 'jpg');

        Portofolio::create([
            'bahan_id' => $request->bahan_id,
            'masjid_id' => $request->masjid_id,
            'ket' => $request->ket,
            'tgl_awal' => $request->tgl_awal,
            'tgl_akhir' => $request->tgl_akhir,
            'gambar' => 'foto/foto-dokumentasi/'.$new_foto
        ]);

        return redirect()->back()->with('message', 'Dokumentasi Telah Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portofolio = Portofolio::findorfail($id);
        $bahan = Bahan::orderBy('nama')->get();
        $masjid = Masjid::orderBy('nama')->get();
        return view('admin.dokumentasi.edit-dokumentasi')->with(compact('portofolio', 'bahan', 'masjid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'bahan_id' => 'required',
            'masjid_id' => 'required',
            'ket' => 'required',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date|after_or_equal:tgl_awal',
            'gambar' => 'file|image|max:2048'
        ]);

        $portofolio = Portofolio::findorfail($id);
        
        if($request->has('gambar')) {
            File::delete($portofolio->gambar);
            $foto = $request->gambar;
            $bahan = Bahan::where('id', $request->bahan_id)->first();
            $masjid = Masjid::where('id', $request->masjid_id)->first();
            $new_foto = time().' '.$request->id.$bahan->nama.$masjid->nama.'.jpg';
            Image::make($foto)->resize(500, 500)->save('foto/foto-dokumentasi/'.$new_foto, 100, 'jpg');

            $data = [
                'bahan_id' => $request->bahan_id,
                'masjid_id' => $request->masjid_id,
                'ket' => $request->ket,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir,
                'gambar' => 'foto/foto-dokumentasi/'.$new_foto
            ];
        }

        else{
            $data = [
                'bahan_id' => $request->bahan_id,
                'masjid_id' => $request->masjid_id,
                'ket' => $request->ket,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir
            ];
        }

        $portofolio->update($data);

        return redirect()->back()->with('message', 'Dokumentasi Telah Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Portofolio::findorfail($id);

        if($save->gambar){
            File::delete($save->gambar);
        }

        Portofolio::destroy($id);

        return redirect()->back()->with('message', 'Dokumentasi Telah Dihapus');
    }
}
