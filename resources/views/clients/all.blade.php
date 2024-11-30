
<x-layout>

    <x-navbar/>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-4 text-white">Tutti i Clienti</h2>
            </div>
        </div>

        <!-- Inizio della Tabella -->
        @foreach ($clients as $client)
        <div class="row custom-client-row">
            <div class="col-1 mt-1">
              <p class="client-id">{{$client->id}}</p>
            </div>
            <div class="col-3 mt-1">
                <p class="client-name">{{$client->name}}</p>
            </div>
            <div class="col-4 mt-1">
                <p class="client-email">{{$client->email}}</p>
            </div>
            <div class="col-2 mt-1">
              <a href="{{ route('edit_clients', $client) }}">
                  <button type="button" class="btn btn-warning custom-btn">Modifica</button>
              </a>
            </div>
            <div class="col-2 mt-1">
                <form action="{{ route('delete_clients', $client) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger custom-btn" onclick="return confirm('Sei sicuro di voler eliminare questo cliente?')">Elimina</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</x-layout>
