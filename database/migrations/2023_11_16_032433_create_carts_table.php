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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity')->nullable()->default(0);
            $table->string('type_product')->nullable()->comment('flea market hay là online medicine');
            $table->string('type_cart')->nullable()->comment('phương thức thanh toán');
            $table->string('type_delivery')->nullable()->comment('phương thức giao hàng');
            $table->string('price')->nullable()->default(0)->comment('giá sản phẩm');
            $table->string('total_price')->nullable()->default(0);
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
