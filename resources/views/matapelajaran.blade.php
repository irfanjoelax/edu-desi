@extends('layouts.web')

@section('title')
    Mata Pelajaran
@endsection

@section('breadcrumb')
    <div class="breadcrumb-item">Mata Pelajaran</div>
@endsection

@section('content')
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
