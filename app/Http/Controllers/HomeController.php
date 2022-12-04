<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\Tugas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'menuActive'   => 'home',
            'total_materi' => MataPelajaran::count(),
            'total_topik'  => Materi::count(),
            'total_kuis'   => Soal::count(),
            'total_tugas'  => Tugas::count(),
        ]);
    }
}
