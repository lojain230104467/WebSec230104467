<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/even') }}">Even Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/prime') }}">Prime Numbers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/multable') }}">Multiplication Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/minitest') }}">Mini Test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/transcript') }}">Transcript</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/products') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/calculator') }}">Calculator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('exam.start') }}">MCQ Exam</a>
            </li>

            @if(Auth::check())
                @if(Auth::user()->role->name == 'Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin') }}">Admin Dashboard</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
