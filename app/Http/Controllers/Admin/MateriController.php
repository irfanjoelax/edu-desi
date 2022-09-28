<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.materi.index', [
            'menuActive' => 'materi',
            'materis'    => Materi::with('matapelajaran')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materi.form', [
            'menuActive'    => 'materi',
            'isEdit'        => false,
            'url'           => url('admin/materi'),
            'matapelajaran' => MataPelajaran::latest()->get(),
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
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();

        Storage::putFileAs('/materi/file/', $file, $namaFile);

        Materi::create([
            'nama'             => $request->nama,
            'matapelajaran_id' => $request->matapelajaran_id,
            'slug'             => Str::slug($request->nama),
            'konten'           => $request->konten,
            'file'             => $namaFile,
        ]);

        Alert::success('Berhasil', ucwords('data materi telah ditambahkan'));

        return redirect('admin/materi');
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
        return view('admin.materi.form', [
            'menuActive' => 'materi',
            'isEdit'     => true,
            'url'        => url('admin/materi/' . $id),
            'matapelajaran' => MataPelajaran::latest()->get(),
            'data'       => Materi::find($id),
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
        $materi   = Materi::find($id);
        $file     = $request->file('file');
        $namaFile = $materi->file;

        if ($file != null) {
            # delete
            Storage::delete('/materi/file/' . $materi->file);

            $namaFile = $file->getClientOriginalName();
            Storage::putFileAs('/materi/file/', $file, $namaFile);
        }

        $materi->update([
            'nama'             => $request->nama,
            'matapelajaran_id' => $request->matapelajaran_id,
            'slug'             => Str::slug($request->nama),
            'konten'           => $request->konten,
            'file'             => $namaFile,
        ]);

        Alert::warning('Berhasil', ucwords('data materi telah diperbarui'));

        return redirect('admin/materi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi   = Materi::find($id);

        Storage::delete('/materi/file/' . $materi->file);

        $materi->delete();

        Alert::error('Berhasil', ucwords('data materi telah dihapus'));
        return redirect('admin/materi');
    }
}
