@extends('siswa.main')

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($courses as $course)
        <div class="col">
            <div class="card custom-card-color">
                <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                    width="100%" height="300">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                    <p class="card-text">{{ $course->deskripsi }}</p>
                    <a href="{{ route('catalog', ['courseId' => $course->id]) }}" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection