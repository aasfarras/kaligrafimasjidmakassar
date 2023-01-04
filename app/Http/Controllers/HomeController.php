<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Feedback;
use App\Models\Masjid;
use App\Models\Portofolio;
use App\Models\Tim;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tim = Tim::orderBy('nama')->paginate(6)->withQueryString();
        $bahan = Bahan::orderBy('nama')->get();
        
        return view('home.index')->with(compact('tim', 'bahan'));
    }

    public function about()
    {
        $feedback = Feedback::orderByDesc('updated_at')->paginate(6)->withQueryString();
        $tim = Tim::orderBy('nama')->paginate(6)->withQueryString();
        $bahan = Bahan::orderBy('nama')->get();

        return view('home.about')->with(compact('feedback', 'tim', 'bahan'));
    }

    public function services()
    {
        $feedback = Feedback::orderByDesc('updated_at')->paginate(6)->withQueryString();
        $bahan = Bahan::orderBy('nama')->get();
        $portofolio = Portofolio::orderByDesc('tgl_awal')->orderByDesc('tgl_akhir')->get();

        return view('home.services')->with(compact('feedback', 'bahan', 'portofolio'));
    }

    public function portofolio()
    {
        $masjid = Masjid::orderBy('nama')->simplePaginate(3)->withQueryString();
        $portofolio = Portofolio::orderByDesc('tgl_awal')->orderByDesc('tgl_akhir')->get();
        $bahan = Bahan::orderBy('nama')->get();

        return view('home.portofolio')->with(compact('masjid', 'portofolio', 'bahan'));
    }

    public function detail($id)
    {
        $portofolio = Portofolio::findorfail($id);
        $bahan = Bahan::orderBy('nama')->get();

        return view('home.detail')->with(compact('portofolio', 'bahan'));
    }

    public function contact()
    {
        $bahan = Bahan::orderBy('nama')->get();

        return view('home.contact')->with(compact('bahan'));
    }
}
