@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Poster</h1>

    <form action="{{ route('admin.posters.update', $poster->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Poster</label>
            <input type="text" name="name" value="{{ $poster->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            @if($poster->photo)
            <img src="{{ asset('storage/' . $poster->photo) }}" alt="Poster" style="height: 100px;">
            @else
            Tidak ada foto
            @endif
        </div>
        <div class="mb-3">
            <label>Ganti Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" {{ $poster->status ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$poster->status ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection