@extends('layouts.landing')

@push('styles')
<style>
html,
body {
    height: 100%;
}

/* Modal Styles */
.modal-hidden {
    display: none;
}

.modal-visible {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1050;
}

.modal-content {
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    position: relative;
    animation: fadeInZoom 0.3s ease-in-out;
}

.modal-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 24px;
    background: transparent;
    border: none;
    cursor: pointer;
}

@keyframes fadeInZoom {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
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
            <li><strong>{{ \Carbon\Carbon::parse($event->start_time)->format('d M') }}</strong> -
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
            // Set content to modal
            document.getElementById('modalEventTitle').textContent = info.event.title;
            document.getElementById('modalEventStart').textContent = new Date(info.event.start)
                .toLocaleString();
            document.getElementById('modalEventEnd').textContent = info.event.end ? new Date(
                info
                .event.end).toLocaleString() : '-';

            // Show modal
            let modal = new bootstrap.Modal(document.getElementById('eventModal'));
            modal.show();
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