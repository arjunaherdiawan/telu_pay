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
        Schema::create('profile_biometric', function(Blueprint $table)
        {
            $table->id('biometric_id')->unique();
            $table->string ('student_id');
            $table->foreign ('student_id')
                ->references('student_id')
                ->on('mahasiswa')
                ->onDelete('cascade');
            $table->string('username');
            $table->string('template_biometric');
            $table->string('enrolled');
            $table->enum('active', ['ACTIVE', 'INACTIVE']);
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
