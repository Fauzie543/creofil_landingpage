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


@foreach($landingContents->take(2) as $content)
<div class="py-5 bg-light">
    <div class="container d-flex flex-column flex-md-row align-items-center gap-5 
        {{ $loop->even ? 'flex-md-row-reverse' : '' }}">

        <div class="flex-shrink-0">
            <img src="{{ asset('storage/' . $content->image) }}" alt="Image" class="img-fluid rounded-4 shadow"
                style="max-width: 500px;">
        </div>
        <div>
            <h2 class="fw-bold mb-3">{{ $content->title }}</h2>
            <p class="text-muted" style="text-align: justify;">
                {{ $content->description }}
            </p>
        </div>
    </div>
</div>
@endforeach

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