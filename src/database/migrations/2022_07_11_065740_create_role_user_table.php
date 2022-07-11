<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('role_user', function (Blueprint $table) {
            $table->foreign('role_id')->refrences('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->refrences('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['role_id', 'user_id'], 'ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('role_user');
    }
}
