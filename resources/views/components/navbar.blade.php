<body>
  <div class="navcontainer">
    <div class="navbody">
      <div class="navigation">
        <ul>
          <li class="list">
            <a href="/" style="color: black;">
              <span class="text">Home</span>
              <span class="icon">
                <img src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763208/accueil_cpyvmd.svg" alt="icone accueil" />
              </span>
            </a>
          </li>
          <li class="list">
            <a href="/" style="color: black;">
              <span class="text">Catalogue</span>
              <span class="icon">
                <img
                  src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Catalogue_cpu1ic.svg"
                  alt="icone catalogue"
                />
              </span>
            </a>
          </li>
        
          <li class="list">
            <a href="/" style="color: black;">
              <span class="text">Favoris</span>
              <span class="icon">
                <img src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Favoris_gw2ufa.svg" alt="icone favoris" />
              </span>
            </a>
          </li>
          <li class="list">
            <a href="/" style="color: black;">
              <span class="text">Profil</span>
              <span class="icon">
                <img src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Profil_bwgkos.svg" alt="icone Profil" />
              </span>
            </a>
          </li>
          <li class="list">
            <a href="/" style="color: black;">
              <span class="text">Panier</span>
              <span class="icon">
                <img src="https://res.cloudinary.com/dhvkfxxvo/image/upload/v1687763206/Panier_rovwtp.svg" alt="icone Panier" />
              </span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
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
                <span class="text">Register</span>
              </a>
            </li>
          @endif
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="icon">
                <i class="bi bi-box-arrow-right"></i>
              </span>
              <span class="text">Logout</span>
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
