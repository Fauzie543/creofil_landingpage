<!-- Pastikan Bootstrap CSS sudah dipanggil -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="bg-white py-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">

            <!-- Breadcrumb & Page Title -->
            <div class="d-flex flex-column justify-content-center ms-5 ms-lg-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="javascript:;">Halaman</a>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">
                            {{ ucfirst(request()->segment(1)) }}
                        </li>
                    </ol>
                </nav>
                <h6 class="fw-bold mb-0">
                    @if (request()->segment(3) && !is_numeric(request()->segment(3)))
                    {{ ucfirst(request()->segment(3)) }}
                    @elseif (is_numeric(request()->segment(2)))
                    Detail
                    @elseif (is_numeric(request()->segment(3)))
                    {{ ucfirst(request()->segment(2)) }}
                    @else
                    @if (ucfirst(request()->segment(2)) == 'Order')
                    Pesanan
                    @else
                    {{ ucfirst(request()->segment(2)) }}
                    @endif
                    @endif
                </h6>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown me-4">
                <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ url('profile/' . auth()->user()->id) }}">Profile</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<!-- Bootstrap JS (Required for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>