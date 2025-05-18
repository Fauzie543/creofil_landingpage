{{-- Toggle button (only visible on small screens) --}}
<nav class="d-md-none navbar navbar-light bg-white shadow-sm p-3">
    <div class="container-fluid">
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu">
            <i class="bi bi-list"></i>
        </button>
        <span class="navbar-brand mb-0 h6">Admin Panel</span>
    </div>
</nav>

{{-- Sidebar --}}
<div class="offcanvas-md offcanvas-start bg-white shadow-sm border-end vh-100" tabindex="-1" id="sidebarMenu">
    <div class="offcanvas-header d-md-none">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-3">
        {{-- Logo --}}
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-center mb-4">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="CREOFIL Logo"
                class="mb-2 rounded shadow-sm mx-auto d-block" style="height: 56px;">
            <h1 class="h6 fw-bold text-dark">CREOFIL ADMIN</h1>
        </a>

        {{-- Nav Items --}}
        <ul class="nav flex-column">
            @php
            $items = [
            ['route' => 'admin.users.*', 'icon' => 'people-fill', 'label' => 'User Management', 'url' =>
            route('admin.users.index')],
            ['route' => 'admin.menus.*', 'icon' => 'list-ul', 'label' => 'Menu', 'url' => route('admin.menus.index')],
            ['route' => 'admin.landing.*', 'icon' => 'image-fill', 'label' => 'Landing Content', 'url' =>
            route('admin.landing.index')],
            ['route' => 'admin.events.*', 'icon' => 'calendar-event-fill', 'label' => 'Event', 'url' =>
            route('admin.events.index')],
            ['route' => 'admin.posters.*', 'icon' => 'image-fill', 'label' => 'Poster Profil', 'url' =>
            route('admin.posters.index')],
            ['route' => 'admin.feedback.*', 'icon' => 'chat-left-text-fill', 'label' => 'Feedback', 'url' =>
            route('admin.feedback.index')],
            ];
            @endphp

            @foreach($items as $item)
            <li class="nav-item mt-2">
                <a href="{{ $item['url'] }}"
                    class="nav-link d-flex align-items-center px-3 py-2 rounded {{ Route::is($item['route']) ? 'bg-light fw-semibold text-dark' : 'text-secondary' }}">
                    <i class="bi bi-{{ $item['icon'] }} me-2"></i> {{ $item['label'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>