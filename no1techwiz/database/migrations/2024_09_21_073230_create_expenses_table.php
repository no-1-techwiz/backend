<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự tăng
            $table->unsignedBigInteger('location_id'); // Khóa ngoại liên kết với bảng locations
            $table->decimal('cost', 10, 2); // Số tiền chi phí, ví dụ: 99999999.99
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Thêm ràng buộc khóa ngoại
            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->onDelete('cascade'); // Khi location bị xóa, expense liên quan cũng sẽ bị xóa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
