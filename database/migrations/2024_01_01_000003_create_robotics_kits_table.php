<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoboticsKitsTable extends Migration
{
    public function up()
    {
        Schema::create('robotics_kits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // StarterKit, Educational Robotics Kit, Kit5
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('robotics_kits');
    }
}
