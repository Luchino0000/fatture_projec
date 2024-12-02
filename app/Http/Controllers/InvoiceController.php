<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Ottieni le fatture solo per l'utente autenticato
        $invoices = auth()->user()->invoices; 

        $invoiceCount = $invoices->count();

 
       

        return view('invoices.index', compact('invoices','invoiceCount'));
    }

    public function create()
{
    // Ottieni i clienti dell'utente per associare una fattura
    $clients = auth()->user()->clients; // Assicurati che la relazione sia definita nel modello User

    return view('invoices.create', compact('clients'));
}


    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'client_id' => 'required|exists:clients,id', // Verifica che il cliente esista
            'data_fattura' => 'required|date',
            'importo' => 'required|numeric',
            'descrizione' => 'nullable|string',
            'invoice_number' => 'required|string|unique:invoices,invoice_number', // Numero fattura univoco
        ]);

         // Calcola l'IVA e il totale (IVA + importo)
    $iva = 0.22 * $request->importo;  // Supponiamo che l'aliquota IVA sia 22%
    $total = $request->importo + $iva;
    
        // Crea una nuova fattura associata all'utente autenticato
        $invoice = new Invoice([
            'client_id' => $request->client_id,
            'data_fattura' => $request->data_fattura,
            'importo' => $request->importo,
            'descrizione' => $request->descrizione,
            'user_id' => auth()->id(), // Associa l'utente autenticato
            'invoice_number' => $request->invoice_number,  // Numero fattura
            'paid' => $request->has('paid'),  
            'paid_at' => $request->has('paid') ? $request->paid_at : null,
            'iva' => $iva,     // Aggiungi l'IVA calcolata
            'total' => $total, // Aggiungi il totale
            'user_id' => auth()->id(),  // Associa l'utente autenticato
        ]);
    
        $invoice->save();

        
    
        return redirect()->route('invoices.index')->with('success', 'Fattura creata con successo!');
    }
    

public function edit(Invoice $invoice)
{
    // Verifica che la fattura appartenga all'utente autenticato
    if ($invoice->user_id !== auth()->id()) {
        abort(403, 'Non hai autorizzazione per modificare questa fattura.');
    }
    
    $invoice->data_fattura = $invoice->data_fattura->format('Y-m-d');
    
    $clients = auth()->user()->clients;

    return view('invoices.edit', compact('invoice','clients'));
}

public function update(Request $request, Invoice $invoice)
{
    // Verifica che la fattura appartenga all'utente autenticato
    if ($invoice->user_id !== auth()->id()) {
        abort(403, 'Non hai autorizzazione per aggiornare questa fattura.');
    }

    // Validazione dei dati
    $request->validate([
        'client_id' => 'required|exists:clients,id', // Verifica che il cliente esista
        'data_fattura' => 'required|date',
        'importo' => 'required|numeric',
        'descrizione' => 'nullable|string',
        'invoice_number' => 'required|string|unique:invoices,invoice_number,' . $invoice->id,
    ]);

    $iva = 0.22 * $request->importo;
    $total = $request->importo + $iva;

    // Aggiorna la fattura
    $invoice->update([
        'client_id' => $request->client_id,
        'data_fattura' => $request->data_fattura,
        'importo' => $request->importo,
        'descrizione' => $request->descrizione,
        'invoice_number' => $request->invoice_number,
        'iva' => $iva,
        'total' => $total,
        'paid' => $request->has('paid'),
        'paid_at' => $request->has('paid') ? $request->paid_at : null,
        
    ]);

    return redirect()->route('invoices.index')->with('success', 'Fattura aggiornata con successo!');
}


public function destroy(Invoice $invoice)
{
    // Verifica che la fattura appartenga all'utente autenticato
    if ($invoice->user_id !== auth()->id()) {
        abort(403, 'Non hai autorizzazione per eliminare questa fattura.');
    }

    // Elimina la fattura
    $invoice->delete();

    return redirect()->route('invoices.index')->with('success', 'Fattura eliminata con successo!');
}








}
