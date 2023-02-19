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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('brand_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('category_id')->constrained()->onDelete('CASCADE');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('primary_image');

            $table->text('description');

            $table->boolean('is_active')->default(1);

            $table->integer('status')->default(1);
            $table->unsignedInteger('delivery_amount')->default(0);
            $table->unsignedInteger('delivery_amount_per_product')->nullable();

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
        Schema::dropIfExists('products');
    }
};
