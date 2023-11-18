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
        //The employee database table consists of the following fields:
        // First Name (required),
        // Last Name (required),
        // Company (foreign key for companies),
        // email address,
        // telephone.
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');

            //$table->string('company');
            $table->unsignedBigInteger('company')->nullable();
            // Внешний ключ для столбца 'company'
            $table->foreign('company')->references('id')->on('companies')->onDelete('set null');

            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
