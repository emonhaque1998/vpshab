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
        Schema::create('websiteinformations', function (Blueprint $table) {
            $table->id();
            $table->string('top_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twiter')->nullable();
            $table->string('instagram')->nullable();
            $table->text('wb_site_short_about')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websiteinformations');
    }
};
