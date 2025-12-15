<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_type'); // hero, services_intro, our_story, blogs_intro, customers_intro
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image')->nullable();
            $table->json('teaser_cards')->nullable(); // For hero right cards
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->unique('section_type'); // Only 1 per section type
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_sections');
    }
};
