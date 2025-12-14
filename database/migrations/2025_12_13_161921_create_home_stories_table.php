<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('paragraph_1')->nullable();
            $table->text('paragraph_2')->nullable();
            $table->text('paragraph_3')->nullable();
            $table->string('side_title')->nullable();
            $table->string('bullet_1')->nullable();
            $table->string('bullet_2')->nullable();
            $table->string('bullet_3')->nullable();
            $table->string('bullet_4')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_stories');
    }
};
