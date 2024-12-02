<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/welcome2', [ClientController::class,'welcome2'])->name('welcome2');
Route::get('/welcome2', [ClientController::class, 'welcome2'])
    ->middleware('auth')
    ->name('welcome2')->middleware('auth');

// ROTTE CLIENTI

Route::get('/add/client', [ClientController::class, 'index'])->name('index');

// CREA NUOVO CLIENTE
Route::post('/new/clients',[ClientController::class, 'store'])->name('new_clients');

// VISUALIZZA TUTTI I CLIENTI
Route::get('/all/clients', [ClientController::class, 'all'])->name('all_clients')->middleware('auth');

// MODIFICA CLIENTE
Route::get('/clients/{client}/edit',[ClientController::class, 'edit'])->name('edit_clients');
Route::put('/clients/{client}',[ClientController::class,'update'])->name('update_clients');

// ELIMINA CLIENTE
Route::delete('/delete/clients/{client}', [ClientController::class, 'destroy'])->name('delete_clients');


// ROTTA FATTURE





// Rotte per la gestione delle fatture

    // Mostra tutte le fatture per l'utente autenticato
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

    // Mostra il modulo per creare una nuova fattura
    Route::get('invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

    // Salva una nuova fattura
    Route::post('invoices', [InvoiceController::class, 'store'])->name('invoices.store');

    // Mostra il modulo per modificare una fattura esistente
    Route::get('invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');

    // Aggiorna una fattura esistente
    Route::put('invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');

    // Elimina una fattura
    Route::delete('invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');



