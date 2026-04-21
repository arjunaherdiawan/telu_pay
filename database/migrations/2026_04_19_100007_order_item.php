<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->id('order_item_id')->unique();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onDelete('cascade');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')
                ->references('item_id')
                ->on('menu_item')
                ->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->decimal('harga_satuan', 16, 2)->default(0);
            $table->decimal('subtotal', 16, 2)->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
