<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['data_fattura', 'importo', 'descrizione', 'client_id','user_id','invoice_number','paid','iva','total','paid_at'];

    protected $casts = [
        'data_fattura' => 'datetime',
        'paid_at' => 'datetime', // Questo fa sì che Laravel converta automaticamente il campo in un oggetto Carbon
    ];


    // Definisci i mutators per formattare la data automaticamente
    protected $dates = ['data_fattura', 'paid_at']; // Aggiungi le colonne di tipo data

    // Mutator per la data_fattura
    public function getDataFatturaAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Restituisce solo la data senza l'ora
    }

    // Mutator per paid_at (data di pagamento)
    public function getPaidAtAttribute($value)
    {
        if ($value) {
            return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Restituisce solo la data senza l'ora
        }
        return null; // Se non c'è una data di pagamento, restituisce null
    }
    

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
