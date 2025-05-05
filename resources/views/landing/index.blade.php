@extends('layouts.landing')

@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center" style="background-color: #fdf0c2;">
    <div class="text-center mb-4">
        <img src="{{ asset('storage/logo/logo.creofil.png') }}" alt="Creofil Logo" style="width: 100px; height: 100px;">
        <h5 class="mt-3 fw-bold">@creofil.id</h5>
        <p>Welcome to Creofil Studio & Space.</p>
        <p><strong>"Find Everything You Need Here"</strong></p>
    </div>

    <div class="w-75 d-flex flex-column gap-3">
        <a href="{{ route('dashboard') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">Dashboard</a>
        <a href="{{ route('about') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">About Us</a>
        <a href="{{ route('menu') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">Menu</a>
        <a href="{{ route('location') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">Location</a>
        <a href="{{ route('event.index') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">Event</a>
        <a href="{{ route('contact') }}" class="btn btn-warning py-3 rounded-3 shadow-sm fw-semibold">Contact Us</a>
    </div>
</div>
@endsection