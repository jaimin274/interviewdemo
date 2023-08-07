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
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("invoice_id");
            $table->foreign("invoice_id")->references("id")->on("invoice_masters");
            $table->foreignId("product_id");
            $table->foreign("product_id")->references("id")->on("product_masters");
            $table->double("rate");
            $table->string("unit");
            $table->integer("qty");
            $table->double("disc_percentage");
            $table->double("net_amount");
            $table->double("total_amount");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
};
