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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('payment_date')->nullable();            
            $table->string('user_id', 20);
            $table->string('warga_id', 20);
            $table->unsignedBigInteger('category_id');            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('warga_id')->references('id')->on('wargas')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
