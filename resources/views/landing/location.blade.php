@extends('layouts.landing')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-2">COFFEE SHOP</h2>
    <p class="text-center text-muted">Temukan Coffee Shop Terdekat!</p>
    <p class="text-center mb-4">
        Kami hadir lebih dekat denganmu. Temukan lokasi COFFEE SHOP di berbagai titik strategis kota—baik untuk ngopi
        pagi, santai sore, maupun meeting santai.
    </p>

    <div class="mx-auto p-4 rounded-4" style="background-color: #99f6e4; max-width: 700px;">
        <h3 class="fw-bold mb-3">📍 Address and Hours</h3>
        <ul class="mb-4" style="padding-left: 1.2rem;">
            <li><strong>Location:</strong> Central Town</li>
            <li><strong>Buka:</strong> 08.00–22.00</li>
            <li><strong>Alamat:</strong> Jl. Merdeka No.10, Yogyakarta</li>
            <li><strong>Fasilitas:</strong> Wi-Fi, Smoking Area, Outdoor Seating</li>
        </ul>

        <div class="ratio ratio-16x9 mb-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3209964749785!2d106.9640531!3d-6.352473399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6993fa8d83c31d%3A0xaf9c30d03f23bb59!2sCreofil%20Studio%20And%20Space!5e0!3m2!1sid!2sid!4v1745572298406!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="text-center">
            <a href="https://maps.app.goo.gl/sisQhvXJkjcu7dC99" target="_blank"
                class="btn btn-teal text-white px-4 py-2 rounded-3" style="background-color: #14b8a6;">
                Get Direct
            </a>
        </div>
    </div>
</div>


@endsection