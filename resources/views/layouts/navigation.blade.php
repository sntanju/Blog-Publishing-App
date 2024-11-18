 <!-- Navbar -->
 <nav class="bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-white font-bold text-xl">Blog Publishing Site</a>
                </div>
                <div class="flex items-center space-x-4 text-white">
                    <!-- Conditional Links based on authentication -->
                    @if(Auth::check())
                        <a href="/dashboard" class="nav-link text-white">Hello {{ Auth::user()->name }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link text-white">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>