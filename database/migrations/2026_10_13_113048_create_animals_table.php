<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('animals', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('birth_date')->nullable();
        $table->string('gender');

        $table->foreignId('species_id')
            ->constrained('species')
            ->restrictOnDelete();

        $table->foreignId('enclosure_id')
            ->constrained('enclosures')
            ->restrictOnDelete();

        $table->foreignId('keeper_id')
            ->constrained('keepers')
            ->restrictOnDelete();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('animals');
}
};
