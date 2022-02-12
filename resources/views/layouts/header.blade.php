<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #171010;">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Amazing E-Book</a>
      <div>
        <ul class="navbar-nav" style="display: flex;align-items: center">
            <li class="nav-item dropdown" style="margin-right: 20px">
                <a style="text-transform:uppercase" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    {{strtoupper(Lang::locale())}}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="lang/id">ID</a></li>
                    <li><a class="dropdown-item" href="lang/en">EN</a></li>
                </ul>
            </li>
            @auth
                <li class="nav-item dropdown" style="margin-right: 20px">
                    <a style="text-transform:uppercase" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Menu</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href='/home'>@lang('index.header.home')</a></li>
                        <li><a class="dropdown-item" href='/cart'>@lang('index.header.cart')</a></li>
                        <li><a class="dropdown-item" href='/profile'>@lang('index.header.profile')</a></li>
                        @if (auth()->user()->role_id==2)
                            <li><a class="dropdown-item" href="/account/maintenance">@lang('index.header.accountmaintenance')</a></li>
                        @endif
                    </ul>
                </li>
                <li><a style="text-transform:uppercase" class="nav-link" href="/Logout" role="button">Log Out</a></li>
            @endauth
            @guest
                <li class="nav-item">
                    <a class="nav-link fs-5"  href="/Login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5"  href="/Register">Register</a>
                </li>
            @endguest
            {{-- <li class="nav-item">
                <a class="nav-link" style="color: white; pointer-events: none; cursor: default;" href="#">{{date("l").", ".date("d-M-Y")}}</a>
            </li> --}}
          </ul>
      </div>
    </div>
</nav>
