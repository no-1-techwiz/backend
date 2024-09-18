<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id('trip_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('trip_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('destination');
            $table->decimal('budget', 10, 2);
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
