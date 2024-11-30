<x-layout>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Tutti i clienti</h2>
            </div>
        </div>


     @foreach ($clients as $client)

        <div class="row">

           

            <div class="col-2 mt-1">
              <p>{{$client->id}}</p>
            </div>
            <div class="col-4 mt-1">
                <p>{{$client->name}}</p>
            </div>
            <div class="col-4 mt-1">
                <p>{{$client->email}}</p>
            </div>
            <div class="col-1 mt-1">
              <a href="{{route('edit_clients',$client)}}">  <button type="button" class="btn btn-warning">Modifica</button> </a>
            </div>
            <div class="col-1 mt-1">

                <form action="{{ route('delete_clients', $client) }}" method="POST">
                    @method('DELETE') <!-- Indica che il form deve usare il metodo DELETE -->
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo cliente?')">Elimina</button>
                </form>
            </div>
                
            
        </div>

    @endforeach

       
    </div>





</x-layout>