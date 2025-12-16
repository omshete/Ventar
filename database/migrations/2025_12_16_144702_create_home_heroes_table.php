<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Ventar – Your IT Service Partner'); // big heading
            $table->text('description')->nullable(); // paragraph under heading
            $table->string('button_label')->default('Explore Services ↓');
            $table->string('button_link')->default('#services');

            // right side 4 cards
            $table->string('card1_title')->default('Web Development');
            $table->string('card1_text')->default('High-performance sites');
            $table->string('card2_title')->default('Cloud & DevOps');
            $table->string('card2_text')->default('Scalable infrastructure');
            $table->string('card3_title')->default('UI/UX Design');
            $table->string('card3_text')->default('Beautiful interfaces');
            $table->string('card4_title')->default('Consulting');
            $table->string('card4_text')->default('Tech strategy');

            $table->boolean('is_active')->default(1);
            $table->integer('sort_order')->default(0); // in case you want multiple versions later
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_heroes');
    }
};
    