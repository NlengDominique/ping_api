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
        Schema::create('checks',static function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('path');
            $table->text('body')->nullable();
            $table->json('headers')->nullable();
            $table->json('parameters')->nullable();
            $table->string('method')->default('GET');
            $table->foreignUlid('credential_id')
                ->nullable()
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignUlid('service_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
