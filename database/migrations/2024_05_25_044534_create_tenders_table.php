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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constraint('users')->onDelete('cascade');
            $table->string('name',20);
            $table->string('email',20);
            $table->integer('phone');
            $table->string('address',50);
            $table->string('type',20);
            $table->string('discription',100);
            $table->string('file',255)  ;
            $table->string('startdate',15);
            $table->string('enddate',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
