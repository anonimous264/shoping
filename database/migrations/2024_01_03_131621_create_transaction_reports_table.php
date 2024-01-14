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
        Schema::create('transaction_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('custumer_id');
            $table->unsignedBigInteger('shoping_order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('pyment_id');
            $table->foreign('custumer_id')->references('id')->on('custumers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shoping_order_id')->references('id')->on('shoping_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pyment_id')->references('id')->on('pyments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_reports');
    }
};
