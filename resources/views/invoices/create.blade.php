{{-- <x-layout>

    <x-navbar/>

<div class="container">
    <h1>Crea una nuova Fattura</h1>

    <!-- Mostra eventuali errori di validazione -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form per creare una nuova fattura -->
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf

        <!-- Campo per scegliere il cliente -->
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client_id" class="form-control" required>
                <option value="">Seleziona un cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo per la data della fattura -->
        <div class="form-group">
            <label for="data_fattura">Data Fattura</label>
            <input type="date" name="data_fattura" id="data_fattura" class="form-control" value="{{ old('data_fattura') }}" required>
        </div>

        <!-- Campo per l'importo -->
        <div class="form-group">
            <label for="importo">Importo</label>
            <input type="number" step="0.01" name="importo" id="importo" class="form-control" value="{{ old('importo') }}" required>
        </div>

        <!-- Campo per la descrizione -->
        <div class="form-group">
            <label for="descrizione">Descrizione</label>
            <textarea name="descrizione" id="descrizione" class="form-control">{{ old('descrizione') }}</textarea>
        </div>

        <!-- Bottone per inviare il form -->
        <button type="submit" class="btn btn-primary">Crea Fattura</button>
    </form>
</div>

</x-layout> --}}

<x-layout>

    <x-navbar/>

    <div class="container bg-creazione mt-5">
        <h1 class="mb-4 h1-creazione">Crea una nuova Fattura</h1>

        <!-- Mostra eventuali errori di validazione -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form per creare una nuova fattura -->
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <!-- Campo per scegliere il cliente -->
            <div class="form-group mb-3">
                <label for="client_id" class="form-label label-creazione">Cliente</label>
                <select name="client_id" id="client_id" class="form-control" required>
                    <option value="">Seleziona un cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="invoice_number">Numero Fattura</label>
                <input type="text" name="invoice_number" id="invoice_number" class="form-control" required>
            </div>

           

            <!-- Campo per la data della fattura -->
            <div class="form-group mb-3">
                <label for="data_fattura" class="form-label label-creazione">Data Fattura</label>
                <input type="date" name="data_fattura" id="data_fattura" class="form-control" value="{{ old('data_fattura') }}" required>
                @error('data_fattura')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo per l'importo -->
            <div class="form-group mb-3">
                <label for="importo" class="form-label label-creazione">Importo (€)</label>
                <input type="number" step="0.01" name="importo" id="importo" class="form-control" value="{{ old('importo') }}" required>
                @error('importo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="paid">Fattura Pagata?</label>
                <input type="checkbox" name="paid" id="paid" value="1" onchange="togglePaidDate()">
            </div>
            
            <div class="form-group" id="paidDateGroup" style="display: none;">
                <label for="paid_at">Data di Pagamento</label>
                <input type="date" name="paid_at" id="paid_at" class="form-control">
            </div>

            <script>
                function togglePaidDate() {
                    const paidCheckbox = document.getElementById('paid');
                    const paidDateGroup = document.getElementById('paidDateGroup');
                    paidDateGroup.style.display = paidCheckbox.checked ? 'block' : 'none';
                }
            </script>


            <!-- Campo per la descrizione -->
            <div class="form-group mb-3">
                <label for="descrizione" class="form-label label-creazione">Descrizione</label>
                <textarea name="descrizione" id="descrizione" class="form-control">{{ old('descrizione') }}</textarea>
                @error('descrizione')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bottone per inviare il form -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Crea Fattura</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">Annulla</a>
            </div>
        </form>
    </div>

</x-layout>
