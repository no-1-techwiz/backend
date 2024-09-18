<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('feedback_id'); // Sử dụng id() để tự động tạo khóa chính
            $table->unsignedTinyInteger('start'); // Điểm đánh giá từ 1 đến 5
            $table->text('description')->nullable(); // Mô tả phản hồi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->string('role'); // Vai trò của người dùng (ví dụ: "admin", "user")
            $table->timestamps(); // Các trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
