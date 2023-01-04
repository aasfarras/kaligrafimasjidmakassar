<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'nama' => 'required|min:3',
            'jabatan' => 'required|min:5',
            'isi' => 'required|max:500',
            'gambar' => 'file|image|max:2048'
        ]);
        
        if($request->gambar) {
            $foto = $request->gambar;
            $new_foto = time().' '.$request->nama.'.jpg';
            Image::make($foto)->resize(500, 500)->save('foto/foto-testimoni/'.$new_foto, 100, 'jpg');

            Feedback::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'isi' => $request->isi,
                'gambar' => 'foto/foto-testimoni/'.$new_foto
            ]);
        }

        else{
            Feedback::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'isi' => $request->isi
            ]);
        }

        return redirect()->back()->with('message', 'Berhasil Mengirim Feedback');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update([
            'tampil' => $request->tampil
        ]);

        if($request->tampil == 1){
            return redirect()->back()->with('message', 'Berhasil Menampilkan Feedback ('.$feedback->nama.')');
        }else{
            return redirect()->back()->with('message', 'Berhasil Menyembunyikan Feedback ('.$feedback->nama.')');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Feedback::findorfail($id);

        if($save->foto){
            File::delete($save->foto);
        }

        Feedback::destroy($id);

        return redirect()->back()->with('message', 'Feedback Telah Dihapus');
    }
}
