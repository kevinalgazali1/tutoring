@extends('admin')

@section('content')

<div class="container mt-4">
        <div>
            <h2 class="mt-5">Welcome to Admin Dashboard</h2>

            <form class="d-flex custom-search-form" role="search" style="background-color: #fff6e4; padding: 8px; border-radius: 8px;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning" type="submit">Search</button>
            </form>
        </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach ($courses->take(3) as $course)
        <div class="col">
            <div class="card custom-card-color">
                <img src="{{ Storage::url($course->gambar) }}" class="card-img-top" alt="{{ $course->nama }}"
                    width="100%" height="300">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{ $course->nama }}</h5>
                    <p class="card-text">{{ $course->deskripsi }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection