<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $feedback = Feedback::cari(request(['search']))->orderByDesc('created_at')->paginate(10);
        $search = $request->search;
        return view('admin.admin')->with(compact('feedback', 'search'));
    }
}
