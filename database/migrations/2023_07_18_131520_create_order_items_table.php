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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_details_id')->constrained();
            $table->foreignId('menu_variation_id')->constrained();
            $table->foreignId('business_id')->constrained();           // "business_id",
            $table->foreignId('variation_category_id')->constrained(); // "variation_category_id",
            $table->float('price');                                    // "price",
            $table->float('selling_price');                            // "selling_price",
            $table->text('menu_variation_name');                       // "menu_variation_name"
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
