<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContratcs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->string('name', 45);
            $table->date('date');
            $table->string('file', 45);
            $table->unsignedBigInteger('employees_id')->length(20);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('contracts', function($table) {
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
        Schema::dropIfExists('contracts');
    }
}
