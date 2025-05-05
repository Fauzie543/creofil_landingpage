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
    <h1 class="h3 fw-bold" style="color: #14213d;">Daftar Event</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-add d-flex align-items-center gap-2 shadow-sm rounded">
        <i class="bi bi-plus-circle-fill"></i> Tambah Event
    </a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle table-bordered mb-0 table-custom">
        <thead class="text-center text-uppercase small fw-bold">
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Waktu</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($events as $event)
            <tr>
                <td class="text-start fw-semibold text-dark">
                    {{ $event->title }}
                </td>
                <td class="small text-muted">
                    {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y, H:i') }} -
                    {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                </td>
                <td class="text-capitalize text-dark">
                    {{ $event->location }}
                </td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.events.edit', $event) }}"
                            class="btn btn-sm btn-outline-primary rounded">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus event ini?')">
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
                    <em>Belum ada event yang terdaftar.</em>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection