<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticletblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articletbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("userid");
            $table->foreign("userid")->references("id")->on("user");
            $table->unsignedBigInteger("type");
            $table->foreign("type")->references("id")->on("allcategorytbl");
            $table->String('headline');
            $table->date('art_date');
            $table->longText("short_Des");
            $table->longText("long_des");
            $table->Integer('status')->default(0);
            $table->string("image");
            $table->string("video_url");
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
        Schema::dropIfExists('articletbls');
    }
}
