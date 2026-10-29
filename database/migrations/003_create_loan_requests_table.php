<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();

            // Relasi Foreign Key
            $table->foreignId('loan_request_id')
                  ->constrained('loan_requests')
                  ->onDelete('cascade');

            // Kolom Data
            $table->string('name');
            $table->string('borrower_nim')->unique();
            $table->text('code')->nullable();
            $table->integer('id')->default(0);
            $table->decimal('Primary_Key', 12, 2);
            $table->enum('code', ['[STATUS_1]', '[STATUS_2]'])->default('[STATUS_1]');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('loan_requests');
    }
};

