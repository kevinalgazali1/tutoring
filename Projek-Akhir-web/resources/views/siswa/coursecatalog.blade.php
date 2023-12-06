@extends('siswa.main')

@section('content')
<div class="text-center">
    <h1>Detail Job</h1>
</div>
<!-- Section-->
<section class="py-5">
<div class="container px-4 px-lg-5 mt-5">
<div class="row justify-content-center">
    <div class="col-lg-8 mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="{{ Storage::url($course->gambar) }}"
                alt="{{ $course->nama }}" />
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
                <div>
                    <!-- Product name-->
                    <h3 class="fw-bolder text-primary">Deskripsi</h3>
                    <p>
                        {{ $course->deskripsi }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-5">
        <div class="card">
            <!-- Product details-->
            <div class="card-body card-body-custom pt-4">
                <div class="text-center">
                    <!-- Product name-->
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bolder">{{ $course->nama }}</h5>
                    </div>
                    <ul class="list-unstyled list-style-group">
                        <li class="border-bottom p-2 d-flex justify-content-between">
                            <span>Rentang Course</span>
                            <span style="font-weight: 600">{{ $course->mulai }} - {{ $course->selesai }}</span>
                        </li>
                        <li class="border-bottom p-2 d-flex justify-content-between">
                            <span>Pengajar</span>
                            <span style="font-weight: 600">{{ $course->pengajar }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent">
                <div class="text-center">
                    @if ($course)
                        <a class="btn btn-primary mt-auto btn-sm"
                            href="https://api.whatsapp.com/send/?phone=6282260640071&text&type=phone_number&app_absent=0">Daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection