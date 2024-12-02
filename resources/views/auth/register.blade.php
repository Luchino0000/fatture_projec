{{-- <x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Fai il Login</h2>
            </div>


            <div class="col-6">
                <form method="POST" action="{{route('register')}}">
                    @csrf

                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input name="name" type="text" class="form-control" id="name">
                          </div>
                      <label for="email" class="form-label">Email</label>
                      <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                      </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                  </form>
            </div>

        </div>

    </div>



</x-layout> --}}

<x-layout>
  <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-12">
              <div class="card shadow-lg">
                  <div class="card-header text-white text-center">
                      <h2>Registrati</h2>
                  </div>
                  <div class="card-body">
                      <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <div class="mb-3">
                              <label for="name" class="form-label">Nome</label>
                              <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" required>
                              @error('name')
                                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" required>
                              @error('email')
                                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input name="password" type="password" class="form-control" id="password" required>
                              @error('password')
                                  <div class="alert alert-danger mt-2">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="mb-3">
                              <label for="password_confirmation" class="form-label">Conferma Password</label>
                              <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                          </div>

                          <div class="d-grid gap-2">
                              <button type="submit" class="btn btn-success">Registrati</button>
                              <a href="{{ route('login') }}" class="btn btn-outline-secondary">Hai già un account? Login</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-layout>
