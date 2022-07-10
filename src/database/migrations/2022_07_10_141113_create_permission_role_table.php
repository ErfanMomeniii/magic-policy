<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('permission_role', function (Blueprint $table) {
            $table->foreign('permission_id')->refrences('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('role_id')->refrences('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['role_id', 'permission_id'], 'rp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('permission_role');
    }
}
