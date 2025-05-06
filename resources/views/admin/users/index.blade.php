@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold" style="color: #14213d;">User Management</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah User</a>
</div>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle table-bordered mb-0 table-custom">
        <thead class="text-center text-uppercase small fw-bold">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse ($users as $user)
            <tr>
                <td class="text-start fw-semibold text-dark">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="small text-muted">{{ $user->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                        style="display:inline-block;" onsubmit="return confirm('Yakin hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-muted py-4"><em>Belum ada user terdaftar.</em></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection