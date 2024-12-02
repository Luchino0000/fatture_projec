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
        ]);
    
        // Crea una nuova fattura associata all'utente autenticato
        $invoice = new Invoice([
            'client_id' => $request->client_id,
            'data_fattura' => $request->data_fattura,
            'importo' => $request->importo,
            'descrizione' => $request->descrizione,
            'user_id' => auth()->id(), // Associa l'utente autenticato
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
    ]);

    // Aggiorna la fattura
    $invoice->update([
        'client_id' => $request->client_id,
        'data_fattura' => $request->data_fattura,
        'importo' => $request->importo,
        'descrizione' => $request->descrizione,
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
