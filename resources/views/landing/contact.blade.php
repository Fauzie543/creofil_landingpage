@extends('layouts.landing')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Contact Us</h2>

    <div class="row">
        {{-- Kontak Kiri --}}
        <div class="col-md-6 mb-4">
            <div class="mb-3 d-flex align-items-center">
                <i class="bi bi-whatsapp me-3 fs-4"></i>
                <a href="https://wa.me/628817549640" target="_blank"
                    class="text-decoration-none text-dark">08817549640</a>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <i class="bi bi-envelope me-3 fs-4"></i>
                <a href="mailto:creofil.com" class="text-decoration-none text-dark">creofil.com</a>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <i class="bi bi-instagram me-3 fs-4"></i>
                <a href="https://instagram.com/creofil.studiospace" target="_blank"
                    class="text-decoration-none text-dark">@creofil.studiospace</a>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <i class="bi bi-facebook me-3 fs-4"></i>
                <a href="https://facebook.com/creofil.studiospace" target="_blank"
                    class="text-decoration-none text-dark">creofil.studiospace</a>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <i class="fab fa-tiktok me-3 fs-4"></i>
                <a href="https://www.tiktok.com/@creofil.studiospace" target="_blank"
                    class="text-decoration-none text-dark">@creofil.studiospace</a>
            </div>
        </div>

        {{-- Form Kanan --}}
        <div class="col-md-6">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('feedback') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input name="first_name" type="text" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input name="email" type="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-secondary px-4">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection