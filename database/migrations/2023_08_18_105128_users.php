<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //作りたいテーブル名とカラムの構造を設定する。
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('username',255);
            $table->string('mail',255)->unique();
            $table->string('password',255);
            $table->string('bio',400)->nullable();
            $table->string('images',255)->default("Atlas.png");
            $table->timestamp('created_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //「usersテーブルを削除する」という命令。usersテーブルが不要になったときにコマンドひとつで対応できるようになった。
        Schema::drop('users');
    }
}
