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
            $table->foreignId('user_id');
            $table->foreignId('vendor_id');
            $table->string('phone');
            $table->string('address');
            $table->float('order_price');
            $table->string('tracking_info');
            $table->string('notes');
            $table->enum('status',['PENDING','APPROVED','WAYTODELIVER','DELIVERED','CANCEL','HOLD'])->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
