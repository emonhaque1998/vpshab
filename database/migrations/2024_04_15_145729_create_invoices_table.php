<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid("orderId");
            $table->enum("status", ["Paid", "Unpaid"])->default("Unpaid");
            $table->unsignedBigInteger("user_id")->index();
            $table->integer("quantity");
            $table->text("note")->nullable();
            $table->boolean("freshIp")->default(false);
            $table->dateTime('expiration_date')->default(now()->addDays(32));
            $table->dateTime('dueDate')->default(now()->addDays(30));
            $table->integer("totalAmount");
            $table->boolean("createInvoiceReniew")->default(false);
            $table->unsignedBigInteger("product_id")->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
