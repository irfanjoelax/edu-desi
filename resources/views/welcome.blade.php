@extends('layouts.web')

@section('title')
    Beranda
@endsection

@section('breadcrumb')
    {{-- <div class="breadcrumb-item">Top Navigation</div> --}}
@endsection

@section('content')
    <div class="row mb-5">
        <div class="col-md-6 col-12 align-self-center">
            <h1 class="text-dark">
                Membawa Kamu ke Tempat yang Kamu inginkan <span class="text-primary">Untuk Belajar</span>
            </h1>
            <p class="text-muted">
                Semua yang perlu kamu ketahui untuk perjalanan studi kamu dari pencarian pertam hingga pembelajaran pertama
            </p>
            <a href="" class="btn btn-lg btn-primary">
                Coba Pilihan Ganda
            </a>
        </div>
        <div class="col-md-6 col-12">
            <img src="{{ asset('img/banner.svg') }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <div class="text-center">
                <h3 class="text-dark">Mata Pelajaran Terbaru</h3>
                <p class="text-muted">Ikuti Setiap Mata Pelajaran Terbaru untuk Mengasah Diri Kamu</p>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($matapelajarans as $matpel)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                    <div class="article-details">
                        <div class="article-title">
                            <h5>
                                {{ $matpel->nama }}
                            </h5>
                        </div>
                        <div class="article-category"><a href="#">{{ $matpel->materis->count() }} Materi</a>
                            <div class="bullet"></div> <a href="#">{{ $matpel->created_at->diffForHumans() }}</a>
                        </div>
                        <a href="{{ url('matapelajaran/' . $matpel->id, []) }}" class="btn btn-outline-primary w-100 mt-3">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection
