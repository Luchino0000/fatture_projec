<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Modifica cliente</h2>
            </div>


            <div class="col-6">
                <form action="{{route('update_clients', $client)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">nome</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{old('name', $client->name) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{old('email', $client->email) }}">
                      </div>
                    <button type="submit" class="btn btn-primary">Modifica</button>
                  </form>
            </div>

        </div>
    </div>


</x-layout>