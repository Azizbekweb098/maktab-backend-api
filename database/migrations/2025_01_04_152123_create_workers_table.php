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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
           $table->foreignId('rahbariyat_id')->nullable()->constrained();
           $table->foreignId('oqituvchilar_id')->nullable()->constrained();
           $table->string('name');
           $table->string('last_name');
           $table->string('image');
           $table->string('ish_kuni');
           $table->string('tell');
           $table->string('link');
           $table->text('lorem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
