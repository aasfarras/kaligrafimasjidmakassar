<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Tim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tim = Tim::cari(request(['search']))->orderBy('nama')->paginate(10)->withQueryString();
        $search = $request->search;
        return view('admin.tim.index-tim')->with(compact('tim', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tim.create-tim');
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
            'posisi' => 'required|min:3',
            'foto' => 'file|image|max:2048',
            'wa' => 'numeric|digits_between:9,15',
            'fb' => '',
            'tt' => '',
            'ig'=> ''
        ]);
        
        if($request->foto) {
            $foto = $request->foto;
            $new_foto = time().' '.$request->nama.'.jpg';
            Image::make($foto)->resize(500, 500)->save('foto/foto-tim/'.$new_foto, 100, 'jpg');

            Tim::create([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'isi' => $request->isi,
                'foto' => 'foto/foto-tim/'.$new_foto,
                'wa' => $request->wa,
                'fb' => $request->fb,
                'tt' => $request->tt,
                'ig'=> $request->ig
            ]);
        }

        else{
            Tim::create([
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'isi' => $request->isi,
                'wa' => $request->wa,
                'fb' => $request->fb,
                'tt' => $request->tt,
                'ig'=> $request->ig
            ]);
        }

        return redirect('/admin/tim')->with('message', 'Anggota Tim Telah Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show(Tim $tim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function edit(Tim $tim)
    {
        return view('admin.tim.edit-tim')->with(compact('tim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|min:3',
            'posisi' => 'required|min:3',
            'foto' => 'file|image|max:2048',
            'wa' => 'numeric|digits_between:9,15',
            'fb' => '',
            'tt' => '',
            'ig'=> ''
        ]);

        $tim = Tim::findorfail($id);
        
        if($request->has('foto')) {
            if($tim->foto){
                File::delete($tim->foto);
            }
            $foto = $request->foto;
            $new_foto = time().' '.$request->nama.'.jpg';
            Image::make($foto)->resize(500, 500)->save('foto/foto-tim/'.$new_foto, 100, 'jpg');

            $data = [
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'isi' => $request->isi,
                'foto' => 'foto/foto-tim/'.$new_foto,
                'slug' => Str::slug(''),
                'wa' => $request->wa,
                'fb' => $request->fb,
                'tt' => $request->tt,
                'ig'=> $request->ig
            ];
        }

        else{
            $data = [
                'nama' => $request->nama,
                'posisi' => $request->posisi,
                'isi' => $request->isi,
                'slug' => Str::slug(''),
                'wa' => $request->wa,
                'fb' => $request->fb,
                'tt' => $request->tt,
                'ig'=> $request->ig
            ];
        }

        $tim->update($data);

        return redirect('/admin/tim')->with('message', 'Anggota Tim Telah Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $save = Tim::findorfail($id);

        if($save->foto){
            File::delete($save->foto);
        }

        Tim::destroy($id);

        return redirect()->back()->with('message', 'Anggota Tim Telah Dihapus');
    }
}
