@extends('layouts.landing')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold" style="color: #14213D;">Menu Kami</h2>

        {{-- Filter Kategori --}}
        <div class="mb-4">
            <form method="GET" action="{{ route('menu') }}" class="row g-2 justify-content-center">
                <div class="col-md-4">
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Kategori --</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </form>

        </div>

        {{-- Menu Cards --}}
        <div class="row g-4">
            @forelse($menus as $menu)
            <div class="col-md-4">
                <div class="card border-0 shadow h-100">
                    @if($menu->photo)
                    <img src="{{ asset('storage/' . $menu->photo) }}" class="card-img-top"
                        style="height: 200px; object-fit: cover;" alt="{{ $menu->name }}">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary fw-semibold">{{ $menu->name }}</h5>
                        <p class="card-text mb-1"><strong>Kategori:</strong> {{ $menu->category->name }}</p>
                        <p class="card-text mb-1"><strong>Harga:</strong> Rp
                            {{ number_format($menu->price, 0, ',', '.') }}</p>
                        <span class="badge bg-{{ $menu->status ? 'success' : 'secondary' }} mt-auto">
                            {{ $menu->status ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada menu untuk kategori ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection