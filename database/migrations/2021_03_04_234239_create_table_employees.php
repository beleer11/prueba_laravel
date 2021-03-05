<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->string('name', 45);
            $table->integer('phone');
            $table->string('address', 45);
            $table->unsignedBigInteger('types_id')->length(20);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('employees', function($table) {
            $table->foreign('types_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
