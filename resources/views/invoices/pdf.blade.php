<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fattura #{{ $invoice->id }}</title>
    <style>
        /* Stili per il PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th, .invoice-details td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .invoice-footer {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>Fattura #{{ $invoice->invoice_number }}</h1>
        <p>Data Fattura: {{ $invoice->data_fattura }}</p>
        <p>Cliente: {{ $invoice->client->name }}</p>
    </div>

    <div class="invoice-details">
        <table>
            <thead>
                <tr>
                    <th>Descrizione</th>
                    <th>Importo</th>
                    <th>IVA</th>
                    <th>Totale</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->descrizione }}</td>
                    <td>{{ number_format($invoice->importo, 2, ',', '.') }} €</td>
                    <td>{{ number_format($invoice->importo * 0.22, 2, ',', '.') }} €</td> <!-- IVA al 22% -->
                    <td>{{ number_format($invoice->importo * 1.22, 2, ',', '.') }} €</td> <!-- Totale con IVA -->
                </tr>
            </tbody>
        </table>
    </div>

    <div class="invoice-footer">
        <p><strong>Stato: </strong>{{ $invoice->paid ? 'Pagata' : 'Non pagata' }} 
            @if($invoice->paid == true)
              <p>il {{ $invoice->paid_at}}</p>
            @endif</p>
        {{-- <p><strong>Data di pagamento: </strong>
            @if($invoice->paid_at instanceof \Carbon\Carbon)
                {{ $invoice->paid_at->format('Y-m-d') }}
            @else
                Non pagata
            @endif
        </p> --}}
        

    </div>
</body>
</html>
