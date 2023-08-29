<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableInmates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmates', function (Blueprint $table) {
            $table->string('offence')->nullable();
            $table->text('judgement')->nullable();
            $table->string('court')->nullable();
            $table->string('virdict')->nullable();
            $table->string('date_of_judgemet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
