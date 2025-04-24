<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Thêm cột user_id
            $table->unsignedBigInteger('user_id')->nullable();
            // Thêm khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Xóa khóa ngoại và cột user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
