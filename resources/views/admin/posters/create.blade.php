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
        Tambah Poster
    </h1>

    <form action="{{ route('admin.posters.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Poster</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-submit px-4 py-2 rounded shadow-sm">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection