<x-layout>

    <x-navbar/>

    <div class="container edit-container mt-5">
        <h1 class="mb-4 edit-h1">Modifica Fattura</h1>

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

        <!-- Form per modificare una fattura -->
        <form action="{{ route('invoices.update', $invoice) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <!-- Campo per scegliere il cliente -->
            <div class="form-group mb-3">
                <label for="client_id" class="form-label label-creazione">Cliente</label>
                <select name="client_id" id="client_id" class="form-control client-select" required>
                    <option value="">Seleziona un cliente</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $client->id == $invoice->client_id ? 'selected' : '' }}>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                @error('client_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo per la data della fattura -->
            <div class="form-group mb-3">
                <label for="data_fattura" class="form-label label-creazione">Data Fattura</label>
                <input type="date" name="data_fattura" id="data_fattura" class="form-control" value="{{ old('data_fattura', $invoice->data_fattura) }}" required>
                @error('data_fattura')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo per l'importo -->
            <div class="form-group mb-3">
                <label for="importo" class="form-label label-creazione">Importo (€)</label>
                <input type="number" step="0.01" name="importo" id="importo" class="form-control" value="{{ old('importo', $invoice->importo) }}" required>
                @error('importo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo per la descrizione -->
            <div class="form-group mb-3">
                <label for="descrizione" class="form-label label-creazione">Descrizione</label>
                <textarea name="descrizione" id="descrizione" class="form-control descrizione-textarea">{{ old('descrizione', $invoice->descrizione) }}</textarea>
                @error('descrizione')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bottone per inviare il form -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Aggiorna Fattura</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary">Annulla</a>
            </div>
        </form>
    </div>

</x-layout>
