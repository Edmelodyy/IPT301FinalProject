<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('feeding_records', function (Blueprint $table) {
        $table->id();

        $table->foreignId('animal_id')
            ->constrained('animals')
            ->cascadeOnDelete();

        $table->foreignId('keeper_id')
            ->constrained('keepers')
            ->restrictOnDelete();

        $table->string('food_type');
        $table->decimal('quantity', 8, 2);
        $table->dateTime('fed_at');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('feeding_records');
}
};
