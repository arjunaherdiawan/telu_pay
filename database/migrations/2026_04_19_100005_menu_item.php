<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_item', function (Blueprint $table) {
            $table->id('item_id')->unique();
            $table->unsignedBigInteger('merchant_id');
            $table->foreign('merchant_id')
                ->references('merchant_id')
                ->on('merchant')
                ->onDelete('cascade');
            $table->string('nama_item', 255)->nullable();
            $table->decimal('harga', 16, 2)->default(0);
            $table->string('kategori')->nullable();
            $table->boolean('is_available')->default(true);
            $table->text('deskripsi')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_item');
    }
};
