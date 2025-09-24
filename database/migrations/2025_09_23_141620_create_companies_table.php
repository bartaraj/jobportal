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
          Schema::create('companies', function (Blueprint $table) {
            $table->id('id'); // Uses a big integer for auto-incrementing primary key
            $table->string('name');
            $table->string('website')->nullable(); // Can be null
            $table->string('email')->unique(); // Must be unique
            $table->text('description')->nullable(); // Can be null
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
