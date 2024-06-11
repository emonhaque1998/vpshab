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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->integer("stock")->default(0);
            $table->string("monthly_price");
            $table->string("annual_price")->nullable();
            $table->string("discount")->nullable();
            $table->string("ram");
            $table->string("disk");
            $table->string("operating_system");
            $table->string("bandwidth");
            $table->string("virtualization");
            $table->string("currency")->default("BDT");
            $table->string("status")->default("draft");
            $table->boolean("freshIp")->default(false);
            $table->integer("freshIP_amount")->nullable();
            $table->unsignedBigInteger("country_id")->index();
            $table->unsignedBigInteger("category_id")->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
