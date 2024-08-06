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
        Schema::create('bidds', function (Blueprint $table) {

            $table->id();
            $table->foreignId('tender_id')->constraint('tenders')->onDelete('cascade');
            $table->foreignId('user_id')->constraint('users')->onDelete('cascade');
            $table->string('name',20);
            $table->string('companyname',20);
            $table->string('email',20);
            $table->integer('phone');
            $table->string('address',50);
            $table->bigInteger('bid_amount');
            $table->string('quotation',255);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidds');
    }
};
