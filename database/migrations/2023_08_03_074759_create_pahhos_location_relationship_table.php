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
        Schema::create('pahhos_location_relationship', function (Blueprint $table) {
            $table->id();
            $table->enum('objectType',['testimonial','addon','property','package']);
            $table->bigInteger('objectId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pahhos_location_relationship');
    }
};