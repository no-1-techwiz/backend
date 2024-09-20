<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_template_id')->nullable();
            $table->unsignedBigInteger('trip_id')->nullable();
            $table->timestamps();

            $table->foreign('location_template_id')->references('id')->on('location_templates')->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
}