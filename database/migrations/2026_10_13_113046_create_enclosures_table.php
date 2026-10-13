<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up(): void
{
    Schema::create('enclosures', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('location');
        $table->unsignedInteger('capacity');
        $table->string('habitat_type');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('enclosures');
}
};
