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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("orderId");
            $table->string("name");
            $table->string("email", 30);
            $table->string("phone", 20);
            $table->double("amount");
            $table->string("address");
            $table->enum("api_status", ["offline", "online", "error"])->nullable();
            $table->enum("status", ["Pending", "Processing", "Successfull", "Expire"])->default("Pending");
            $table->string("transaction_id")->nullable();
            $table->string("currency", 20);
            $table->string("ipAddress")->nullable();
            $table->string("api_key")->nullable();
            $table->string("api_hash")->nullable();
            $table->boolean("next_discount")->default(false);
            $table->integer("discount_amount")->nullable();
            $table->boolean("renew")->default(false);
            $table->dateTime('expiration_date')->default(now()->addDays(32));
            $table->dateTime('dueDate')->default(now()->addDays(30));
            $table->unsignedBigInteger("product_id")->index();
            $table->unsignedBigInteger("user_id")->index();
            $table->unsignedBigInteger("invoice_id")->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
