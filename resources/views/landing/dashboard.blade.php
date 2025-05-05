@extends('layouts.landing')

@section('content')
<div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($posters as $index => $poster)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            @if (!empty($poster->photo))
            <img src="{{ asset('storage/' . $poster->photo) }}" class="d-block w-100" alt="Poster {{ $index + 1 }}"
                style="max-height: 500px; object-fit: cover;">
            @endif
        </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>



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


        <ul class="mt-4">
            @foreach($events as $event)
            <li><strong>{{ \Carbon\Carbon::parse($event->start_time)->format('d M') }}</strong> - {{ $event->title }}
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="py-5 text-white text-center"
    style="background-image: url('/storage/logo/poster.jpeg'); background-size: cover;">
    <div class="container">
        <blockquote class="blockquote">
            <p class="mb-4 fs-4">“Our mission is to provide the best Indonesian coffee experience to the world's coffee
                drinkers.”</p>
            <a href="#about" class="btn btn-warning fw-semibold">Read More</a>
        </blockquote>
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
            document.getElementById('modalEventEnd').textContent = info.event.end ? new Date(info
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