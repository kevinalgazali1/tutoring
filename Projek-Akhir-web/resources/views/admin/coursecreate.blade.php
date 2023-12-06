@extends('admin')

@section('content')
<div class="card">
    <div class="card-header">
        Form Tambah Course
    </div>
    <div class="card-body">
        <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Course</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <label for="mulai">Tanggal Mulai</label>
                <input type="date" name="mulai" class="form-control" value="{{ old('mulai') }}">
            </div>
            <div class="form-group">
                <label for="selesai">Tanggal Selesai</label>
                <input type="date" name="selesai" class="form-control" value="{{ old('selesai') }}">
            </div>
            <div class="form-group">
                <label for="pengajar">Pengajar</label>
                <input type="text" name="pengajar" class="form-control" value="{{ old('pengajar') }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
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