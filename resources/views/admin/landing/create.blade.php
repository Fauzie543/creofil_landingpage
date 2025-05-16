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
        Tambah Konten Landing Page
    </h1>

    <form action="{{ route('admin.landing.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input name="title" value="{{ old('title') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Gambar (opsional)</label>
            <input name="image" type="file" class="form-control">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-submit px-4 py-2 rounded shadow-sm">
                Simpan Konten
            </button>
        </div>
    </form>
</div>
@endsection