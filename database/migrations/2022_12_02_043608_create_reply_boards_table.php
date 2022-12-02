<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('grp')->nullable()->comment('계층형 그룹');
            $table->integer('sort')->nullable()->comment('계층형 순서');
            $table->integer('depth')->nullable()->comment('계층형 단계');
            $table->integer('member_seq')->comment('회원 시퀀스');
            $table->string('member_name', 20);
            $table->string('title');
            $table->longText('memo');
            $table->string('files1')->nullable();
            $table->string('files2')->nullable();
            $table->integer('read')->default(0)->comment('조회');
            $table->string('status', 1)->default('Y')->comment('Y: 사용, N:중지');     //Y/N
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
        Schema::dropIfExists('reply_boards');
    }
}
