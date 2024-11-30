<x-layout>

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



</x-layout>