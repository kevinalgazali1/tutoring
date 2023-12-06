@extends('siswa.main')

@section('content')
<div class="container">
    <h1>{{ $course->nama }} - Lesson Content</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $content->judul }}</h5>
            <p>{{ $content->materi }}</p>
        </div>
    </div>
</div>
@endsection