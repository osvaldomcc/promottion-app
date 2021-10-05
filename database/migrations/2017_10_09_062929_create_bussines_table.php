<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBussinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slogan');
            $table->integer('ranking');
            $table->text('address');
            $table->text('description');
            $table->text('characteristics');
            $table->boolean('banner');
            $table->string('slug');
            $table->string('logo');
            $table->integer('lang_id')->unsigned();
            $table->foreign('lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipalities')->onDelete('cascade');
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });

         Schema::create('bussine_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('bussine_id')->unsigned();
            $table->foreign('bussine_id')->references('id')->on('bussines')->onDelete('cascade');
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
        Schema::drop('bussine_user');
        Schema::drop('bussines');
    }
}
