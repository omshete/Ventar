<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('home_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Our Story');          // main heading
            $table->text('paragraph_1')->nullable();                // first paragraph
            $table->text('paragraph_2')->nullable();                // second paragraph
            $table->text('paragraph_3')->nullable();                // third paragraph
            $table->string('side_title')->default('Why Ventar?');   // right card title
            $table->text('bullet_1')->nullable();
            $table->text('bullet_2')->nullable();
            $table->text('bullet_3')->nullable();
            $table->text('bullet_4')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_stories');
    }
};
