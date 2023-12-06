@extends('siswa.main')

@section('content')
    <div class="container">
        <h1>Daftar ke Course</h1>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $course->nama }}</h5>
                <p class="card-text">{{ $course->deskripsi }}</p>
                @if (!$course->students->contains(auth()->user()))
                    <!-- Tampilkan tombol atau tautan untuk mendaftar ke course -->
                    <a href="{{ route('siswa.daftar', ['course' => $course]) }}" class="btn btn-primary">Daftar Course</a>
                @endif
            </div>
        </div>
    </div>
@endsection
