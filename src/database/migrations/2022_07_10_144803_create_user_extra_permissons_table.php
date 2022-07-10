<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtraPermissonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('user_extra_permissions',function (Blueprint $table){
            $table->increments('id');
            $table->foreign('user_id')->refrences('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission_id')->refrences('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['user_id','permission_id'],'up');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('user_extra_permissions');
    }
}
