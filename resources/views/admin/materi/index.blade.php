@extends('layouts.app')

@section('title')
    Materi
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ url('/admin/materi/create', []) }}" class="btn btn-primary mb-4">
                Tambah Data
            </a>
            <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Materi</th>
                            <th class="text-center">Mata Pelajaran</th>
                            <th class="text-center">File Materi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->matapelajaran->nama }}</td>
                                <td class="text-center">
                                    <a target="_blank" href="{{ asset('storage/materi/file/' . $item->file) }}">
                                        Download
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/materi/' . $item->id . '/edit', []) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/materi/' . $item->id) }}" class="btn btn-sm btn-danger"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete-{{ $item->id }}').submit();">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                    <form id="delete-{{ $item->id }}" action="{{ url('/admin/materi/' . $item->id) }}"
                                        method="POST" class="d-none">
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".datatable").dataTable();

        $(".summernote").summernote({
            dialogsInBody: true,
            minHeight: 250,
        });
    </script>
@endsection
