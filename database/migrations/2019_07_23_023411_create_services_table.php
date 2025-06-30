<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('servicedept_id');
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->text('details')->nullable();
            $table->text('details_en')->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->text('picture')->nullable();
            $table->timestamps();

            //Relation
            $table->foreign('servicedept_id')->references('id')->on('servicedepts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
