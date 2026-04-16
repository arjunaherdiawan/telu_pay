<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallet', function(Blueprint $table) 
        {

            $table->id();
            $table->string ('wallet_id');
            $table->string ('account_id');
            $table->foreign ('account_id')
                ->references('account_id')
                ->on('akun')
                ->onDelete('cascade');
            $table->decimal ('saldo');
            $table->string ('mata_uang');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet');
    }
};
