
<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0 p-5">
    <div class="container">

        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('themes/images/config/studio.png')}}" alt="fox_logo">
        </a>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{Route::current()->getName() === 'post.index' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('post.index')}}">Notícias</a>
                </li>
                <li class="nav-item {{Route::current()->getName() === 'user.index' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('user.index')}}">Usuários</a>
                </li>
                <li class="nav-item dropdown sub-item">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Restrito
                        <span><i class="ti-angle-down"></i></span>
                    </a>
                    <!-- Dropdown list -->
                    <ul class="dropdown-menu drop">
                        @auth
                            <li class="nav-item @@contact {{Route::current()->getName() === 'admin' ? 'active':''}}">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item {{Route::current()->getName() === 'login' ? 'active' : ''}}">
                                <a href="#" class="nav-link" style="color: #0b2e13;">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item @@contact">
                                    <a href="#" class="nav-link">Registrar</a>
                                </li>
                            @endif
                        @endauth

                        <li class="dropdown dropdown-submenu dropleft">
                            <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                <li><a class="dropdown-item" href="{{route('post.create')}}">Criar notícias</a></li>
                                <li><a class="dropdown-item" href="{{route('user.create')}}">Criar usuários</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


