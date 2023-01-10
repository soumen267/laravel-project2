<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('footer_title');
            $table->string('footer_desc');
            $table->string('footer_social');
            $table->string('footer_nav');
            $table->string('footer_category');
            $table->string('news_title');
            $table->string('news_desc');
            $table->string('footer_copy');
            $table->string('footer_logo');
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
        Schema::dropIfExists('options');
    }
};
