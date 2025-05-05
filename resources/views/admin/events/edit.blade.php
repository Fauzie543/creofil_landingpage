@extends('admin.layouts.app')

@section('content')
<style>
.form-label {
    font-weight: 600;
    color: #14213d;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
}

.form-control:focus {
    border-color: #fca311;
    box-shadow: 0 0 0 0.2rem rgba(252, 163, 17, 0.25);
}

.btn-submit {
    background-color: #fca311;
    color: white;
    font-weight: 600;
}

.btn-submit:hover {
    background-color: #e59400;
}
</style>

<div class="bg-white shadow-sm rounded p-4 p-md-5 mx-auto" style="max-width: 720px;">
    <h1 class="h4 fw-bold mb-4" style="color: #14213d;">
        Edit Event
    </h1>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Event</label>
            <input name="title" value="{{ old('title', $event->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="4"
                class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Waktu Mulai</label>
                <input name="start_time" type="datetime-local"
                    value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i')) }}"
                    class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Waktu Selesai</label>
                <input name="end_time" type="datetime-local"
                    value="{{ old('end_time', \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i')) }}"
                    class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input name="location" value="{{ old('location', $event->location) }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Poster (opsional)</label>
            <input name="poster_image" type="file" class="form-control">
            @if ($event->poster_image)
            <small class="text-muted d-block mt-1">Poster saat ini: <a
                    href="{{ asset('storage/' . $event->poster_image) }}" target="_blank">Lihat Poster</a></small>
            @endif
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-submit px-4 py-2 rounded shadow-sm">
                Update Event
            </button>
        </div>
    </form>
</div>
@endsection