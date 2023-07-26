<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->String("name")->nullable();
            $table->String("description")->nullable();
            $table->String("packge_type")->nullable();
            $table->String("course_price")->nullable();
            $table->String("image")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->date("enrolled_limit")->nullable();
            $table->String("status")->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
