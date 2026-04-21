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

            $table->id('wallet_id')->unique();
            $table->unsignedBigInteger('account_id');
            $table->foreign ('account_id')
                ->references('account_id')
                ->on('akun')
                ->onDelete('cascade');
            $table->decimal('saldo', 16, 2)->default(0);
            $table->string ('mata_uang');
            $table->dateTime('update_at');
            $table->dateTime('created_at');

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
