<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToLocationTemplatesTable extends Migration
{
    public function up()
    {
        Schema::table('location_templates', function (Blueprint $table) {
            $table->text('description')->nullable()->after('image'); // Thêm cột description
        });
    }

    public function down()
    {
        Schema::table('location_templates', function (Blueprint $table) {
            $table->dropColumn('description'); // Xóa cột nếu migration bị lùi lại
        });
    }
}
