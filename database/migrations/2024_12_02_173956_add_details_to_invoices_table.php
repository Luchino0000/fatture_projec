<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoice_number')->nullable();  // Numero fattura
            $table->boolean('paid')->default(false);       // Stato di pagamento
            $table->timestamp('paid_at')->nullable();
            $table->decimal('iva', 8, 2)->nullable();     // IVA
            $table->decimal('total', 8, 2)->nullable();   // Totale (compreso IVA)
        });
    }
    
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['invoice_number', 'paid', 'iva', 'total','paid_at']);
        });
    }
    
};
