<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableChildrens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childrens', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->string('name', 45);
            $table->integer('age');
            $table->unsignedBigInteger('employees_id')->length(20);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('childrens', function($table) {
            $table->foreign('employees_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childrens');
    }
}
