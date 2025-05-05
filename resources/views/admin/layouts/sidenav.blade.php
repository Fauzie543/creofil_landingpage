<aside class="bg-white shadow-sm border-end vh-100 d-flex flex-column align-items-center p-3">
    <!-- Logo -->
    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-center mb-4">
        <img src="{{ asset('storage/logo/logo.png') }}" alt="CREOFIL Logo" class="mb-2 rounded shadow-sm"
            style="height: 56px;">
        <h1 class="h6 fw-bold text-dark m-0">CREOFIL ADMIN</h1> <!-- text-primary diganti text-dark -->
    </a>

    <!-- Nav Items -->
    <ul class="nav flex-column w-100 mt-4">
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center px-3 py-2 rounded-pill
                {{ Route::is('admin.users.*') ? 'bg-light text-dark fw-semibold' : 'text-secondary' }}">
                <i class="bi bi-people-fill me-2 {{ Route::is('admin.users.*') ? 'text-dark' : '' }}"></i>
                <span class="fw-medium">User Management</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <a href="{{ route('admin.menus.index') }}" class="nav-link d-flex align-items-center px-3 py-2 rounded-pill
        {{ Route::is('admin.menus.*') ? 'bg-light text-dark fw-semibold' : 'text-secondary' }}">
                <i class="bi bi-list-ul me-2 {{ Route::is('admin.menus.*') ? 'text-dark' : '' }}"></i>
                <span class="fw-medium">Menu</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <a href="{{ route('admin.events.index') }}" class="nav-link d-flex align-items-center px-3 py-2 rounded-pill
                {{ Route::is('admin.events.*') ? 'bg-light text-dark fw-semibold' : 'text-secondary' }}">
                <i class="bi bi-calendar-event-fill me-2 {{ Route::is('admin.events.*') ? 'text-dark' : '' }}"></i>
                <span class="fw-medium">Event</span>
            </a>
        </li>
        <li class="nav-item mt-2">
            <a href="{{ route('admin.posters.index') }}" class="nav-link d-flex align-items-center px-3 py-2 rounded-pill
        {{ Route::is('admin.posters.*') ? 'bg-light text-dark fw-semibold' : 'text-secondary' }}">
                <i class="bi bi-image-fill me-2 {{ Route::is('admin.posters.*') ? 'text-dark' : '' }}"></i>
                <span class="fw-medium">Poster Profil</span>
            </a>
        </li>

        <li class="nav-item mt-2">
            <a href="{{ route('admin.feedback.index') }}" class="nav-link d-flex align-items-center px-3 py-2 rounded-pill
        {{ Route::is('admin.feedback.*') ? 'bg-light text-dark fw-semibold' : 'text-secondary' }}">
                <i class="bi bi-chat-left-text-fill me-2 {{ Route::is('admin.feedback.*') ? 'text-dark' : '' }}"></i>
                <span class="fw-medium">Feedback</span>
            </a>
        </li>

    </ul>
</aside>

<style>
.nav-link {
    transition: all 0.2s ease-in-out;
    text-decoration: none !important;
}

.nav-link:hover {
    background-color: #f0f0f0;
    /* abu-abu muda */
    color: #212529 !important;
    /* font hitam */
}
</style>