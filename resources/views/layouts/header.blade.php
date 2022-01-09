<!--
<header class="bg-blue-900 py-6">
    <div class="container mx-auto flex justify-between items-left px-2">
        <div >
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>
        <nav class="space-x-4 text-gray-300 text-sm sm:text-xl">
        <a class="no-underline hover:underline" href="{{ url('xml') }}">{{ __('Calls and Emails') }}</a>
        <a class="no-underline hover:underline" href="{{ url('index') }}">{{ __('Tasks') }}</a>
        </nav>
        
        <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
            @guest
            <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
            @else
            <span>{{ Auth::user()->name }}</span>

            <a href="{{ route('logout') }}" class="no-underline hover:underline" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
            @endguest
        </nav>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('xml') }}">{{ __('Calls and Emails') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"href="{{ url('index') }}">{{ __('Tasks') }}</a>
      </li>
    </ul>
  </div>
</nav>
-->
<header>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color:pink;">
        <a class="navbar-brand" href="{{ url('home') }}">TicketingApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        




            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    @auth
                    <a class="nav-link" href="{{ url('xml') }}">{{ __('Calls and Emails') }}</a>
                    @endauth
                </li>
                <li class="nav-item">
                @auth
                    <a class="nav-link" href="{{ url('tasks') }}">{{ __('Tasks') }}</a>
                    @endauth
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                <a class="nav-link">Hi,{{ Auth::user()->name }}!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                </form>

                @endguest
            </ul>
        </div>
    </nav>
</header>