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
    Schema::create('peserta', function (Blueprint $table) {
        $table->id();
        $table->char('nik', 16)->unique();
        $table->string('nama', 100);
        $table->string('email', 100);
        $table->string('no_hp', 20);
        $table->text('alamat');
        $table->date('tanggal_lahir');
        $table->foreignId('skema_id')
              ->constrained('skema')
              ->cascadeOnUpdate()
              ->restrictOnDelete();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('peserta');
}
};
