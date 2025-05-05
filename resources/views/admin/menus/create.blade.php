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
        Tambah Menu
    </h1>

    <!-- Form untuk tambah kategori -->


    <!-- Form untuk tambah menu -->
    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Menu</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <div class="d-flex align-items-center gap-2">
                <select name="category_id" class="form-select" required style="flex:1">
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addCategoryModal">
                    + Kategori
                </button>
            </div>
        </div>


        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="price" value="{{ old('price') }}" class="form-control" required>
        </div>

        <div class="mb-3">
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

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection