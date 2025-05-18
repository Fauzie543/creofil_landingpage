@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="display-4 mb-4">Dashboard</h1>
    <p class="text-muted mb-4">Selamat datang di Admin Panel Coffee Shop. Kelola event kamu dengan mudah di sini!</p>

    <div class="d-flex flex-wrap gap-4">
        <!-- Total Events -->
        <div class="card shadow-sm border-0 flex-fill" style="min-width: 250px; max-width: 300px;">
            <div class="card shadow-sm border-0">
                <div class="card-body animate__animated animate__fadeInUp">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-circle me-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div>
                            <h6 class="card-title text-muted">Total Event</h6>
                            <h2 class="fs-1 fw-bold mb-0" id="totalEvents"></h2>
                            <small>This Month: {{ $eventsThisMonth }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 flex-fill" style="min-width: 250px; max-width: 300px;">
            <div class="card shadow-sm border-0">
                <div class="card-body animate__animated animate__fadeInUp">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded-circle me-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-cup-hot-fill"></i>
                        </div>
                        <div>
                            <h6 class="card-title text-muted">Total Menu</h6>
                            <h2 class="fs-1 fw-bold mb-0" id="totalMenus"></h2>
                            <small>This Month: {{ $menusThisMonth }}</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Total Feedback -->
        <div class="card shadow-sm border-0 flex-fill" style="min-width: 250px; max-width: 300px;">
            <div class="card shadow-sm border-0">
                <div class="card-body animate__animated animate__fadeInUp">

                    <div class="d-flex align-items-center mb-3">

                        <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded-circle me-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div>
                            <h6 class="card-title text-muted">Total Feedback</h6>
                            <h2 class="fs-1 fw-bold mb-0" id="totalFeedback"></h2>
                            <small>This Month: {{ $feedbacksThisMonth }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Landing Page Visitors -->
        <div class="card shadow-sm border-0 flex-fill" style="min-width: 250px; max-width: 300px;">
            <div class="card shadow-sm border-0">
                <div class="card-body animate__animated animate__fadeInUp">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white d-flex align-items-center justify-content-center rounded-circle me-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h6 class="card-title text-muted">Landing Page Visitors</h6>
                            <h2 class="fs-1 fw-bold mb-0" id="totalVisitors"></h2>
                            <small>This Month: {{ $visitorsThisMonth }}</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script bagian bawah -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/countup.js@2.0.7/dist/countUp.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // CountUp
    new CountUp('totalEvents', @json($totalEvents), {
        startVal: 0
    }).start();
    new CountUp('totalMenus', @json($totalMenus), {
        startVal: 0
    }).start();
    new CountUp('totalFeedback', @json($totalFeedbacks), {
        startVal: 0
    }).start();
    new CountUp('totalVisitors', @json($totalVisitors), {
        startVal: 0
    }).start();


});
</script>

@endpush
@endsection