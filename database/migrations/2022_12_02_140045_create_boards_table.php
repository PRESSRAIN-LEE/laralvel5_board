<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('grp')->comment('같은 주제의 고유번호');
            $table->integer('sort')->comment('순서');
            $table->integer('depth')->comment('계층');
            $table->integer('member_seq');
            $table->string('member_name', 20);
            $table->string('board_title');
            $table->longText('board_content');
            $table->integer('board_read')->default(0);
            $table->string('board_state', 1)->default('Y')->comment('Y:정상 / N:삭제');
            $table->string('board_file1')->nullable();
            $table->string('board_file1_ori', 50)->nullable();
            $table->string('board_file2')->nullable();
            $table->string('board_file2_ori', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
