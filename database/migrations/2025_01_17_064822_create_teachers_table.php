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
        if (!Schema::hasTable('teachers')) {
            Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('email', 100);
                $table->string('phone', 15);
                $table->date('hire_date');
                $table->string('department', 50);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
