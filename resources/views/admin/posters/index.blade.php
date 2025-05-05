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
    /* border table lebih jelas */
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
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold" style="color: #14213d;">Poster Profil</h1>
    <a href="{{ route('admin.posters.create') }}" class="btn btn-add d-flex align-items-center gap-2 shadow-sm rounded">
        <i class="bi bi-plus-circle-fill"></i> Tambah Poster
    </a>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle table-bordered mb-0 table-custom">
        <thead class="text-center text-uppercase small fw-bold">
            <tr>
                <th>Nama</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($posters as $poster)
            <tr>
                <td>{{ $poster->name }}</td>
                <td>
                    @if($poster->photo)
                    <img src="{{ asset('storage/' . $poster->photo) }}" alt="Poster" style="height: 80px;">
                    @else
                    Tidak ada foto
                    @endif
                </td>
                <td>
                    @if ($poster->status)
                    <span class="badge bg-success">Aktif</span>
                    @else
                    <span class="badge bg-secondary">Tidak Aktif</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.posters.edit', $poster->id)}}"
                            class="btn btn-sm btn-outline-primary rounded">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.posters.destroy', $poster->id)  }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $posters->links() }}
</div>
@endsection