@extends('admin')

@section('content')
<div class="row">
    <div class="col-lg-8">
        @if (session('message'))
        <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card">
            <div class="card-header">
                Form Edit Course
            </div>
            <div class="card-body">
                <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Course</label>
                        <input type="text" name="nama" class="form-control"
                            value="{{ old('nama', $course->nama) }}">
                    </div>
                    <div class="form-group">
                        <label for="mulai">Tanggal Mulai</label>
                        <input type="date" name="mulai" class="form-control"
                            value="{{ old('mulai', $course->mulai) }}">
                    </div>
                    <div class="form-group">
                        <label for="selesai">Tanggal Selesai</label>
                        <input type="date" name="selesai" class="form-control"
                            value="{{ old('selesai', $course->selesai) }}">
                    </div>
                    <div class="form-group">
                        <label for="pengajar">Pengajar</label>
                        <input type="text" name="pengajar" class="form-control"
                            value="{{ old('pengajar', $course->pengajar) }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $course->deskripsi) }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-header">
            Form Edit Gambar
        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.updateImage', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <img src="{{ Storage::url($course->gambar) }}" class="img-fluid" alt="">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection