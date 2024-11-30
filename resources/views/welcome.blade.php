<x-layout>

    <div class="container-fluid bg vh-100">
        <div class="row justify-content-center p-5">

        

            <div class="col-4 text-center card">
                <h1 class="h1-custom">Accedi al tuo registro</h1>
          
                    <form method="POST" action="{{route('login')}}">
                        @csrf

                        <div class="form-container">
                            <form>
                              <input for="email" name="email" type="email" placeholder="Email" class="form-input" required>
                              <input for="exampleInputPassword1" name="password" type="password" placeholder="Password" class="form-input" required>
                              <button type="submit" class="special-button">Accedi</button>
                            </form>
                          </div>
                          

                      </form>
               
            </div>





        </div>
    </div>


</x-layout>
