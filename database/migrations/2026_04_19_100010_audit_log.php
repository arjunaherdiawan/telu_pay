<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_log', function (Blueprint $table) {
            $table->id('audit_log_id')->unique();
            $table->unsignedBigInteger('auditor_id')->nullable();
            $table->foreign('auditor_id')
                ->references('admin_id')
                ->on('admins')
                ->onDelete('cascade');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')
                ->references('account_id')
                ->on('akun')
                ->onDelete('set null');
            $table->string('event_type', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->dateTime('timestamp_audit')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_log');
    }
};
