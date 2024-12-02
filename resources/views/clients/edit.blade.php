{{-- <x-layout>

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


</x-layout> --}}

<x-layout>

    <x-navbar/>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Modifica Cliente</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('update_clients', $client)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name', $client->name) }}" 
                                       placeholder="Inserisci il nome del cliente" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $client->email) }}" 
                                       placeholder="Inserisci l'email del cliente" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Salva Modifiche</button>
                                <a href="{{ route('all_clients') }}" class="btn btn-outline-secondary">Annulla</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
