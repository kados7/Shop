<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('address_id');
            $table->foreign('address_id')->references('id')->on('user_addresses')->cascadeOnDelete();

            $table->foreignId('coupon_id')->nullable()->constrained()->cascadeOnDelete();

            $table->tinyInteger('status')->defult(0);
            $table->unsignedInteger('total_amount');
            $table->unsignedInteger('delivery_amount')->default(0);
            $table->unsignedInteger('coupon_amount')->default(0);
            $table->unsignedInteger('paying_amount')->default(0);
            $table->enum('payment_type' , ['pos' , 'cash' , 'shabaNumber' , 'cardTocard' , 'online']);
            $table->tinyInteger('payment_status')->defult(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
