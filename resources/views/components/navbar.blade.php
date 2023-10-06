<body>
  <div class="navcontainer" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
    <div class="navbody">
      <div class="navigation">
        <ul>
          <li class="list logo">
            <a href="/" style="color: black; margin-right: 20px;">
                <img src="{{ asset('images/nn.png') }}" alt="Logo" width="90" height="90" class="logo-image">
            </a>
        </li>
        @guest
          
        
      
          @endguest
          <li class="list" >
            <a href="/ads" style="color: black;">
              <span class="text">Publicado</span>
              <span class="icon">
                <img
                  src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Catalogue_cpu1ic.svg"
                  alt="icone catalogue"
                />
              </span>
            </a>
          </li>
          @if(Auth::check() && Auth::user()->is_revisor == 1)
          <li class="list">
            <a href="/ads/create" style="color: black;">
              <span class="text">Publicar</span>
              <span class="icon">
                <img src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Favoris_gw2ufa.svg" alt="icone favoris" />
              </span>
            </a>
          </li>
          @endif
          <li class="list">
            @auth
                @if (Auth::user()->is_revisor)
                    <a class="nav-link" href="{{ route('revisor.index') }}">
                        <span class="icon">
                            <i class="bi bi-person"></i>
                        </span>
                        <span class="text">Revisor</span>
                        <!-- Mostrar contador si hay anuncios no visibles -->
                        @php
                            $notVisibleAdsCount = app('App\Http\Controllers\AdController')->countNotVisibleAds();
                        @endphp
                        @if ($notVisibleAdsCount > 0)
                            <span class="badge bg-danger">{{ $notVisibleAdsCount }}</span>
                        @endif
                    </a>
                @endif
            @endauth
        </li>
          <li class="list">
            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.users.index') }}" style="color: black;">
                        <span class="icon">
                            <i class="bi bi-gear"></i> <!-- Icono de engranaje para el panel de administrador -->
                        </span>
                        <span class="text">Admin</span>
                    </a>
                @endif
            @endauth
          
        </li>
     
        </ul>
        <ul class="navbar-nav ms-auto" style="margin-left: -30px;">
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <span class="icon">
                  <i class="bi bi-person"></i>
                </span>
                <span class="text">Login</span>
              </a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                <span class="icon">
                  <i class="bi bi-person-plus"></i>
                </span>
                <span class="text">Registro</span>
              </a>
            </li>
          @endif
        @else
          <li class="nav-item" style="margin-left: -10px;">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="icon">
                <i class="bi bi-box-arrow-right"></i>
              </span>
              <span class="text">Exit</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        @endguest
        </ul>
      </div>
    </div>
  </div>
</body>
