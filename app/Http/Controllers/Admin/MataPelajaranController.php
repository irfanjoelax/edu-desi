<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.matapelajaran.index', [
            'menuActive'     => 'mata-pelajaran',
            'matapelajarans' => MataPelajaran::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matapelajaran.form', [
            'menuActive' => 'mata-pelajaran',
            'isEdit'     => false,
            'url'        => url('admin/matapelajaran'),
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
        MataPelajaran::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        Alert::success('Berhasil', ucwords('data mata pelajaran telah ditambahkan'));

        return redirect('admin/matapelajaran');
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
        return view('admin.matapelajaran.form', [
            'menuActive' => 'mata-pelajaran',
            'isEdit'     => true,
            'url'        => url('admin/matapelajaran/' . $id),
            'data'       => MataPelajaran::find($id),
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
        MataPelajaran::find($id)->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        Alert::warning('Berhasil', ucwords('data mata pelajaran telah diperbarui'));

        return redirect('admin/matapelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataPelajaran::find($id)->delete();
        Alert::error('Berhasil', ucwords('data mata pelajaran telah dihapus'));
        return redirect('admin/matapelajaran');
    }
}
