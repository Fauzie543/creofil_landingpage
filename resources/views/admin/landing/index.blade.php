@extends('admin.layouts.app')

@section('content')
<style>
.table-custom thead {
    background-color: #fca311;
    color: #14213d;
}

.table-custom tbody tr:hover {
    background-color: #fff7e6;
}

.table-custom td,
.table-custom th {
    border: 1px solid #dee2e6;
}

.btn-outline-primary {
    border-color: #fca311;
    color: #fca311;
}

.btn-outline-primary:hover {
    background-color: #fca311;
    color: white;
}

.btn-outline-danger {
    border-color: #d9534f;
    color: #d9534f;
}

.btn-outline-danger:hover {
    background-color: #d9534f;
    color: white;
}

.btn-add {
    background-color: #fca311;
    color: white;
    font-weight: 600;
}

.btn-add:hover {
    background-color: #e59400;
}

.content-img {
    max-height: 80px;
    object-fit: cover;
    border-radius: 5px;
}
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold" style="color: #14213d;">Konten Landing Page</h1>
    <a href="{{ route('admin.landing.create') }}" class="btn btn-add d-flex align-items-center gap-2 shadow-sm rounded">
        <i class="bi bi-plus-circle-fill"></i> Tambah Konten
    </a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle table-bordered mb-0 table-custom">
        <thead class="text-center text-uppercase small fw-bold">
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($landingContent as $content)
            <tr>
                <td class="fw-semibold text-start">{{ $content->title }}</td>
                <td class="text-start small">{{ Str::limit(strip_tags($content->description), 100) }}</td>
                <td>
                    @if ($content->image)
                    <img src="{{ asset('storage/' . $content->image) }}" class="content-img" alt="Thumbnail">
                    @else
                    <em class="text-muted small">Tidak ada gambar</em>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.landing.edit', $content->id) }}"
                            class="btn btn-sm btn-outline-primary rounded">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.landing.destroy', $content->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted py-4">
                    <em>Belum ada konten yang ditambahkan.</em>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection