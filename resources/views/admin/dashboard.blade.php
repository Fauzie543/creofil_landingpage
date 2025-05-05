@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="display-4 mb-4">Dashboard</h1>
    <p class="text-muted mb-4">Selamat datang di Admin Panel Coffee Shop. Kelola event kamu dengan mudah di sini!</p>

    <div class="row g-4">
        <!-- Total Events -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body animate__animated animate__fadeInUp">

                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-circle me-3"
                            style="width: 60px; height: 60px;">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div>
                            <h6 class="card-title text-muted">Total Events</h6>
                            <h2 class="fs-1 fw-bold mb-0" id="totalEvents"></h2>
                            <small>This Month: {{ $eventsThisMonth }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Feedback -->
        <div class="col-md-4">
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
        <div class="col-md-4">
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
    new CountUp('totalFeedback', @json($totalFeedbacks), {
        startVal: 0
    }).start();
    new CountUp('totalVisitors', @json($totalVisitors), {
        startVal: 0
    }).start();

    // Chart.js
    const randomData = () => Array.from({
        length: 6
    }, () => Math.floor(Math.random() * 100));

    new Chart(document.getElementById('eventsChart'), {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                data: randomData(),
                borderColor: "#4e73df",
                backgroundColor: "rgba(78,115,223,0.1)",
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false
                },
                y: {
                    display: false
                }
            }
        }
    });

    new Chart(document.getElementById('feedbackChart'), {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                data: randomData(),
                borderColor: "#e74a3b",
                backgroundColor: "rgba(231,74,59,0.1)",
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false
                },
                y: {
                    display: false
                }
            }
        }
    });

    new Chart(document.getElementById('visitorsChart'), {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                data: randomData(),
                borderColor: "#1cc88a",
                backgroundColor: "rgba(28,200,138,0.1)",
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    display: false
                },
                y: {
                    display: false
                }
            }
        }
    });
});
</script>

@endpush
@endsection