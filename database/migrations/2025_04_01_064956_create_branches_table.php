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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('incharge');
            $table->bigInteger('contact');
            $table->string('email')->nullable;
            $table->bigInteger('remoteid');
            $table->string('username')->nullable;
            $table->string('password')->nullable;
            $table->string('isp1')->nullable;
            $table->string('speed')->nullable;
            $table->string('price')->nullable;
            $table->string('isp2')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
