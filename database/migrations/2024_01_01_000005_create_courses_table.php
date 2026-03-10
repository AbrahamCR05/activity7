<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_key')->unique();   // Rob101, Rob102...
            $table->string('title');
            $table->string('cover_image')->nullable();
            $table->longText('content');
            $table->unsignedBigInteger('kit_id');
            $table->timestamps();

            $table->foreign('kit_id')->references('id')->on('robotics_kits')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
