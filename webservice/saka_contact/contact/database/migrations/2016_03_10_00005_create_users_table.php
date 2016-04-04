<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 255)->unique();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->text('profile_picture');
            $table->text('password');
            $table->string('phone', 100);
            $table->string('twitter', 100);
            $table->string('facebook', 100);
            $table->string('linkedin', 100);
            $table->integer('registered');   
            $table->integer('roles_id')->unsigned();
            $table->integer('companies_id')->unsigned();
            $table->integer('status_types_id')->unsigned();
            $table->string('status_description', 140);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->foreign('companies_id')->references('id')->on('companies');
            $table->foreign('status_types_id')->references('id')->on('status_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
