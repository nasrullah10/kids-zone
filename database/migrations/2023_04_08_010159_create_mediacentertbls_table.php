<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediacentertblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediacentertbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("type");
            $table->foreign("type")->references("id")->on("allcategorytbl");
            $table->String('headline');
            $table->date('media_date');
            $table->longText("short_Des");
            $table->longText("long_des");
            $table->string("image_video");
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
        Schema::dropIfExists('mediacentertbls');
    }
}
