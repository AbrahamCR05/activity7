<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDidacticMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('didactic_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->string('file_path');
            $table->string('type')->default('pdf'); // pdf, video, link, image
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('didactic_materials');
    }
}
