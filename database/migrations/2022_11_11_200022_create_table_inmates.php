<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInmates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmates', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('gender');
            $table->date('dob');
            $table->text('address')->nullable();
            $table->text('education_level')->nullable();
            $table->unsignedBigInteger('cell_block_id');
            $table->string('sentence');
            $table->date('date_from');
            $table->date('date_to');
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_relation')->nullable();
            $table->text('image')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            // $table->softDeletes('deleted_at');

            //Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cell_block_id')->references('id')->on('cell_blocks')->onDelete('cascade');
        });

        Schema::create('inmates_crimes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inmate_id');
            $table->unsignedBigInteger('crime_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            // $table->softDeletes('deleted_at');

            //Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inmate_id')->references('id')->on('inmates')->onDelete('cascade');
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmates');
        Schema::dropIfExists('inmates_crimes');
    }
}
