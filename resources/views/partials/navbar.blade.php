<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/"><i class="bi bi-megaphone"></i> Realsourcecodes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">PYTHON</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">PHP</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">JAVA</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">CODEIGNITER</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">ANDROID</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">JAVASCRIPT</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">CPP</a>
                </li>


                @auth
                {{-- kalau user sudah login tampilkan ini --}}
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form action="/logout" method="POST">
                              @csrf
                              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right">
                                </i> logout</button>
                          </form>
                      </li>
                    </ul>
                  </li>
                @else
                {{-- kalau user belum login tampilkan ini --}}
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}">Login</a>
                </li>
                @endauth
            </ul>

          
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-facebook"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>