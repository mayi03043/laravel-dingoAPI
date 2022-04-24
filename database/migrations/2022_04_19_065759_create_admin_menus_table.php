<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->id();
            $table->integer('mid')->default(0)->comment('关联ID');
            $table->integer('pid')->default(0)->comment('父ID');
            $table->tinyInteger('hidden')->default(0)->comment('是否隐藏：1是，0否');
            $table->tinyInteger('status')->default(0)->comment('是否禁用：1是，0否');
            $table->integer('ord')->default(0)->comment('排序');
            $table->string('title')->comment('名称');
            $table->string('url')->default('')->comment('url');
            $table->string('route')->comment('route');
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
        Schema::dropIfExists('admin_menus');
    }
}
