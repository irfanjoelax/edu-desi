<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.soal.index', [
            'menuActive' => 'soal-ujian',
            'soals'      => Soal::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.soal.form', [
            'menuActive' => 'soal-ujian',
            'isEdit'     => false,
            'url'        => url('admin/soal'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Soal::create([
            'pertanyaan'    => $request->pertanyaan,
            'pilihan_a'     => $request->pilihan_a,
            'pilihan_b'     => $request->pilihan_b,
            'pilihan_c'     => $request->pilihan_c,
            'pilihan_d'     => $request->pilihan_d,
            'pilihan_e'     => $request->pilihan_e,
            'kunci_jawaban' => $request->kunci_jawaban,
        ]);

        Alert::success('Berhasil', ucwords('data soal ujian telah ditambahkan'));

        return redirect('admin/soal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.soal.form', [
            'menuActive' => 'soal-ujian',
            'isEdit'     => true,
            'url'        => url('admin/soal/' . $id),
            'data'       => Soal::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Soal::find($id)->update([
            'pertanyaan'    => $request->pertanyaan,
            'pilihan_a'     => $request->pilihan_a,
            'pilihan_b'     => $request->pilihan_b,
            'pilihan_c'     => $request->pilihan_c,
            'pilihan_d'     => $request->pilihan_d,
            'pilihan_e'     => $request->pilihan_e,
            'kunci_jawaban' => $request->kunci_jawaban,
        ]);

        Alert::warning('Berhasil', ucwords('data soal ujian telah diperbarui'));

        return redirect('admin/soal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Soal::find($id)->delete();
        Alert::error('Berhasil', ucwords('data soal ujian telah dihapus'));
        return redirect('admin/soal');
    }
}
