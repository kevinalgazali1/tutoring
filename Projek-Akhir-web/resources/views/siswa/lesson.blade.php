@extends('siswa.main')

@section('content')
<div class="container">
    @if($course)
        <h1>Course Contents</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $course->nama }}</h5>
            </div>
        </div>

        <div class="mt-4">
            <h2>Lesson Contents</h2>
            @forelse($contents as $content)
                <ul>
                    <li>
                        <h4>{{ $content->judul }}</h4>
                        <p>{{ $content->materi }}</p>
                        <!-- Update the link to include the course and content parameters -->
                        <a href="{{ route('siswa.lesson.content', ['course' => $course->id, 'content' => $content->id]) }}">Go to Lesson</a>
                    </li>
                </ul>
            @empty
                <p>No contents available for this course.</p>
            @endforelse
        </div>
    @else
        <p>No course found.</p>
    @endif
</div>
@endsection
