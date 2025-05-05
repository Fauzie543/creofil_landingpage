<nav x-data="{ open: false }" class="bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex flex-col justify-center ml-8 sm:ml-20">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-dark" href="javascript:;">Halaman</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            {{ ucfirst(request()->segment(1)) }}
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">
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
                </nav>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-6">
                <!-- User Dropdown -->
                <div class="relative">
                    <button @click="open = ! open"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1">
                        <a href="{{ url('profile/' . auth()->user()->id) }}"
                            class="block px-4 py-2 text-sm text-gray-700">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="text-gray-500 hover:text-gray-700">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
// Navbar scroll effect
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('nav');
    var scrollPosition = window.scrollY;
    if (scrollPosition > 0) {
        navbar.classList.add('navbar-fixed');
    } else {
        navbar.classList.remove('navbar-fixed');
    }
});
</script>