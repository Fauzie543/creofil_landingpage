@extends('layouts.landing')

@push('styles')
<style>
:root {
    --primary-color: #fca311;
    --primary-soft: #ffe5b4;
    --primary-gradient: linear-gradient(135deg, #fca311 0%, #ffe5b4 100%);
    --accent-color: #14213d;
    --light-gray: #f7f7f7;
}

body {
    background-color: var(--light-gray);
    color: #333;
    font-family: 'Segoe UI', sans-serif;
}

/* Carousel Caption Styling */
.carousel-caption {
    background: rgba(252, 163, 17, 0.8);
    /* semi-transparan orange */
    border-radius: 12px;
    padding: 1rem 1.5rem;
    color: #fff;
}

/* Carousel Indicator Colors */
.carousel-control-prev-icon,
.carousel-control-next-icon {

    border-radius: 50%;
    padding: 1rem;
}

/* Section Title */
h3 {
    color: var(--accent-color);
}

/* Event Section Background */
#event {
    background: var(--primary-gradient);
    color: #333;
}

/* Calendar Card */
#calendar {
    background: white;
    padding: 20px;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(252, 163, 17, 0.15);
    border-left: 5px solid #fca311;
}

/* Event List */
ul li {
    padding: 6px 0;
}

/* Default message styling */
.bg-gray-100 {
    background-color: #fff3e0 !important;
}

/* Button Close Modal (optional future use) */
.btn-close {
    filter: brightness(0) saturate(100%) invert(40%) sepia(78%) saturate(1227%) hue-rotate(358deg) brightness(105%) contrast(101%);
}
</style>
@endpush

@section('content')
<div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @forelse($events as $index => $event)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

            @if (!empty($event->poster_image))
            <img src="{{ asset('storage/' . $event->poster_image) }}" class="d-block w-100" alt="{{ $event->title }}"
                style="max-height: 500px; object-fit: cover;">
            @else
            <!-- Menampilkan gambar default jika poster_image kosong -->
            <img src="{{ asset('images/default-event.jpg') }}" class="d-block w-100" alt="Default Event Image"
                style="max-height: 500px; object-fit: cover;">
            @endif

            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h5>{{ $event->title }}</h5>
                <p>{{ \Carbon\Carbon::parse($event->start)->format('d M Y H:i') }} -
                    {{ \Carbon\Carbon::parse($event->end)->format('d M Y H:i') }}</p>
                <p>{{ $event->description}}</p>

            </div>
        </div>
        @empty
        <!-- Menampilkan pesan atau gambar default jika tidak ada event -->
        <div class="carousel-item active">
            <img src="{{ asset('images/default-event.jpg') }}" class="d-block w-100" alt="No Events"
                style="max-height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                <h5>No Upcoming Events</h5>
            </div>
        </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>



{{-- Upcoming Events --}}
<div class="bg-info-subtle py-5" id="event">
    <div class="container">
        <h3 class="text-center fw-bold mb-4">Upcoming Event</h3>

        <div id='calendar'></div>

        <!-- Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Event Detail</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6 id="modalEventTitle"></h6>
                        <p><strong>Start:</strong> <span id="modalEventStart"></span></p>
                        <p><strong>End:</strong> <span id="modalEventEnd"></span></p>
                    </div>
                </div>
            </div>
        </div>

        @if ($events->count())
        <ul class="mt-4">
            @foreach($events as $event)
            <li><strong>{{ \Carbon\Carbon::parse($event->start)->format('d M Y ') }}</strong> -
                {{ $event->title }}</li>
            @endforeach
        </ul>
        @else
        <div class="max-w-xl mx-auto bg-gray-100 p-8 rounded-lg text-center">
            <p class="text-gray-600">No upcoming events right now. Stay tuned! 🚀</p>
        </div>
        @endif

    </div>
</div>



@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 500,
        events: @json($events),
        eventClick: function(info) {
            const targetTitle = info.event.title;

            // Cari index event pada carousel yang cocok
            const carouselItems = document.querySelectorAll('#eventCarousel .carousel-item');
            let targetIndex = 0;
            carouselItems.forEach((item, index) => {
                const captionTitle = item.querySelector('.carousel-caption h5')?.textContent
                    .trim();
                if (captionTitle === targetTitle) {
                    targetIndex = index;
                }
            });

            // Ubah slide di carousel ke index yang ditemukan
            const carousel = new bootstrap.Carousel(document.querySelector('#eventCarousel'));
            carousel.to(targetIndex);

            // Scroll ke atas halaman untuk lihat carousel
            document.getElementById('eventCarousel').scrollIntoView({
                behavior: 'smooth'
            });
        }

    });
    calendar.render();
});
</script>
@endpush

@push('styles')
<style>
#calendar {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
}
</style>
@endpush