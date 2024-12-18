{{-- <x-layout>

    <x-navbar></x-navbar>


@foreach ($invoices as $invoice)
    <tr>
        <td>{{ $invoice->client->name }}</td>
        <td>{{ $invoice->data_fattura }}</td>
        <td>{{ $invoice->importo }}</td>
        <td>
            <a href="{{ route('invoices.edit', $invoice) }}">Modifica</a>
            <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Elimina</button>
            </form>
        </td>
    </tr>
@endforeach


</x-layout> --}}

<x-layout>

    <x-navbar></x-navbar>

    <div class="container bg-container mt-5">
        <h2>Lista delle Fatture</h2>
        <h2>Totale fatture {{$invoiceCount}}</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numero Fattura</th>
                    <th>Cliente</th>
                    <th>Data Fattura</th>
                    <th>Importo</th>
                    <th>Totale</th>
                    <th>IVA</th>
                    <th>Stato</th>
                    <th>Scarica</th>
                    <th>Azioni</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->invoice_number }}</td>
                        <td>{{ $invoice->client->name }}</td>
                        <td>{{ $invoice->data_fattura }}</td>
                        <td>{{ number_format($invoice->importo, 2) }} €</td>
                        <td>{{ number_format($invoice->iva, 2) }} €</td>
                        <td>{{ number_format($invoice->total, 2) }} €</td>
                      <td>{{ $invoice->paid ? 'Pagata' : 'Non pagata' }} 
                        @if($invoice->paid == true)
                          <p>il {{ $invoice->paid_at}}</p>
                        @endif</td>
                        <td>
                            <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-primary">Scarica PDF</a>
                        </td>
                        <td>
                            <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-warning btn-sm">Modifica</a>
                            <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa fattura?')">Elimina</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   

</x-layout>


