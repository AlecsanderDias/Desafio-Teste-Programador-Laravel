<div class="nav justify-content-start bg-light pr-3">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-body" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          @if(auth()->check())
            {{ auth()->user()->name }}
          @else
            Guest
          @endif
        </a>
        <div class="dropdown-menu">
            @guest
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                </form>
            @endauth
        </div>
    </li>
</div>