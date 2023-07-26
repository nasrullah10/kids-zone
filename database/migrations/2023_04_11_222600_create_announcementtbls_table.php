<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementtblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcementtbls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("type");
            $table->foreign("type")->references("id")->on("allcategorytbl");
            $table->String('headline');
            $table->date('a_date');
            $table->longText("short_Des");
            $table->longText("long_des");
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
        Schema::dropIfExists('announcementtbls');
    }
}
