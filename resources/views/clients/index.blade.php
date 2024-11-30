
<x-layout>
    <x-navbar/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- Intestazione della pagina -->
                <div class="page-header text-center mb-4">
                    <h2>Aggiungi un Nuovo Cliente</h2>
                    <p>Completa i dettagli per aggiungere un cliente al gestionale</p>
                </div>

                <!-- Modulo per aggiungere un cliente -->
                <form action="{{ route('new_clients') }}" method="POST" class="form-add-client">
                    @csrf

                    <!-- Campo nome -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Cliente</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Inserisci il nome del cliente">
                    </div>

                    <!-- Campo email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Inserisci l'email del cliente">
                    </div>

                    <!-- Bottone di submit -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-lg custom-btn">Aggiungi Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
