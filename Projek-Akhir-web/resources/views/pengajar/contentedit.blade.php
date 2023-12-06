@extends('pengajar.main')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Content
    </div>
    <div class="card-body">
        <form action="{{ route('content.update', ['content' => $content->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $content->judul }}">
            </div>
            <div class="form-group">
                <label for="materi">Materi</label>
                <textarea name="materi" id="materi" class="form-control" rows="5">{{ $content->materi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
