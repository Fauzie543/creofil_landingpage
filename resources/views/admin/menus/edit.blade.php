@extends('admin.layouts.app')

@section('content')
<div class="bg-white shadow-sm rounded p-4 p-md-5 mx-auto" style="max-width: 720px;">
    <h1 class="h4 fw-bold mb-4" style="color: #14213d;">
        Edit Menu
    </h1>

    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="name" value="{{ $menu->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="price" value="{{ $menu->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="description" value="{{ $menu->description }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Saat Ini</label><br>
            @if($menu->photo)
            <img src="{{ asset('storage/' . $menu->photo) }}" alt="Menu" style="height: 100px;">
            @else
            Tidak ada foto
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Foto</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-4">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" {{ $menu->status ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !$menu->status ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm">
                Update
            </button>
        </div>
    </form>
</div>
@endsection