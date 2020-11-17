<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewRoleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_role_menus', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('role_id')->references('rol_id')->on('role');
            $table->foreignId('menu_id')->references('id')->on('new_menus');
            $table->boolean('status')->default(false);
            $table->string('role_id');
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
        Schema::dropIfExists('new_role_menus');
    }
}
