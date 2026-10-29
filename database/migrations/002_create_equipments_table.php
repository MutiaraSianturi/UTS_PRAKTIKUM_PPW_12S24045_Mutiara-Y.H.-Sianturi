<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();

            // Relasi Foreign Key
            $table->foreignId('equipment_id')
                  ->constrained('equipment')
                  ->onDelete('cascade');

            // Kolom Data
            $table->string('name');
            $table->string('VARCHAR 100')->unique();
            $table->text('code')->nullable();
            $table->integer('id')->default(0);
            $table->decimal('Primary_Key', 12, 2);
            $table->enum('code', ['[STATUS_1]', '[STATUS_2]'])->default('[STATUS_1]');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('equipments');
    }
};

