<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\MataPelajaran;
use App\Models\Soal;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WebController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'menuActive'     => 'beranda',
            'matapelajarans' => MataPelajaran::with('materis')->limit(9)->latest()->get(),
        ]);
    }

    public function matapelajaran()
    {
        return view('matapelajaran', [
            'menuActive'     => 'materi',
            'matapelajarans' => MataPelajaran::with('materis')->latest()->get(),
        ]);
    }

    public function matpelDetail($id)
    {
        return view('matapelajaran-detail', [
            'menuActive'     => 'materi',
            'matapelajaran'  => MataPelajaran::find($id),
        ]);
    }

    public function latihansoal()
    {
        return view('latihansoal', [
            'menuActive' => 'kuis',
            'soals'      => Soal::latest()->get(),
        ]);
    }

    public function submitLatihan(Request $request)
    {
        $pilihan    = $request->pilihan;
        $id_soal    = $request->id;
        $jumlah     = $request->jumlah;

        $score = 0;
        $benar = 0;
        $salah = 0;
        $kosong = 0;

        for ($i = 0; $i < $jumlah; $i++) {
            $nomor = $id_soal[$i]; // id nomor soal

            // jika user tidak memilih jawaban
            if (empty($pilihan[$nomor])) {
                $kosong++;
            } else {
                // jika memilih
                $jawaban = $pilihan[$nomor];

                // cocokan jawaban dengan yang ada didatabase
                $where = array(
                    'id' => $nomor,
                    'kunci_jawaban' => $jawaban,
                );

                // $cek = $this->db->where($where)->get('soal')->num_rows();
                $cek = Soal::where($where)->count();

                if ($cek == 1) {
                    // jika jawaban cocok (benar)
                    $benar++;
                } else {
                    // jika salah
                    $salah++;
                }
            }

            // $jumlah_soal = $this->db->where('aktfsoal', 1)->get('soal')->num_rows();
            $jumlah_soal = Soal::count();
            $score = 100 / $jumlah_soal * $benar;
        }

        $text = 'Score: ' . $score . ', Benar: ' . $benar . ', Salah: ' . $salah . ', Kosong: ' . $kosong;

        if ($score >= 75) {
            Alert::success('Baik', $text);
        }

        if ($score <= 74.9 && $score >= 50) {
            Alert::warning('Cukup', $text);
        }

        if ($score <= 49.5) {
            Alert::error('Tidak Lulus', $text);
        }

        return redirect('kuis');
    }

    public function kirimtugas()
    {
        return view('kirimtugas', [
            'menuActive' => 'kirim-tugas',
            'tugas'      => Tugas::latest()->get(),
        ]);
    }

    public function kirimtugasForm($id)
    {
        return view('kirimtugas-submit', [
            'menuActive' => 'kirim-tugas',
            'tugas'      => Tugas::find($id),
        ]);
    }

    public function kirimtugasSubmit(Request $request, $id)
    {
        $file     = $request->file('file');
        $namaFile = $file->getClientOriginalName();

        Storage::putFileAs('jawaban/file', $file, $namaFile);

        Jawaban::create([
            'tugas_id'   => $id,
            'nama'       => $request->nama,
            'no_induk'   => $request->no_induk,
            'file_jawab' => $namaFile,
        ]);

        Alert::success('Berhasil', ucwords('Submit atau kirim tugas anda telah berhasil'));

        return redirect('kirimtugas');
    }
}
