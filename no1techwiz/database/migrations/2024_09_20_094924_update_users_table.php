<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Thêm cột avatar nếu chưa tồn tại
            if (!Schema::hasColumn('users', 'avatar')) {
                $table->string('avatar')->nullable()->after('password');
            }
            
            // Thêm cột role nếu chưa tồn tại
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['admin', 'user'])->default('user')->after('remember_token');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa cột avatar nếu có
            if (Schema::hasColumn('users', 'avatar')) {
                $table->dropColumn('avatar');
            }
            
            // Xóa cột role nếu có
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
}