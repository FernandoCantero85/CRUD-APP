<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a migration.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // ID automático (chave primária)
            $table->date('birth_date')->nullable();
            $table->string('name'); // Nome do estudante
            $table->string('email')->unique(); // Email único
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverte a migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
