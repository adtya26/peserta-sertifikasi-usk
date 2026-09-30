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
    Schema::create('skema', function (Blueprint $table) {
        $table->id();
        $table->string('kode_skema', 30)->unique();
        $table->string('nama_skema', 150);
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('skema');
}
};
