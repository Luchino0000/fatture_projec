
  @auth
  <nav class="navbar navbar-expand-lg custom-navbar">
      <div class="container-fluid">
          <a class="navbar-brand" href="/welcome">MyApp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="/welcome2">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('index') }}">Aggiungi Clienti</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('all_clients') }}">Tutti i clienti</a>
                  </li>
                </ul>


               
              
          </div>
          {{-- <ul class=" navbar-nav ml-auto d-flex justify-content-end">

            <li class="nav-item">
                <a class="nav-link">Ciao {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn btn-danger custom-logout-btn">Logout</button>
                </form>
            </li>

          </ul> --}}

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu">
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-danger custom-logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
          </div>
      </div>
  </nav>
  @endauth
  
  @guest
  <nav class="navbar navbar-expand-lg custom-navbar">
      <div class="container-fluid">
          <a class="navbar-brand" href="/">MyApp</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  @endguest
  
