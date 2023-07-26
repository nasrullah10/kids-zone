<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCstorytblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cstorytbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("userid");
            $table->foreign("userid")->references("id")->on("user");
            $table->unsignedBigInteger("type");
            $table->foreign("type")->references("id")->on("allcategorytbl");
            $table->string("Title");
            $table->string("typefic");
            $table->longText("short_Des");
            $table->longText("long_Des");
            $table->string("image");
            $table->Integer('status')->default(0);
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
        Schema::dropIfExists('cstorytbls');
    }
}
