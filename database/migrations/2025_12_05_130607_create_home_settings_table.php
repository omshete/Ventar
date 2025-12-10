<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();

            $table->string('footer_company')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_phone')->nullable();
            $table->string('footer_linkedin')->nullable();
            $table->string('footer_instagram')->nullable();
            $table->string('footer_facebook')->nullable();
            $table->string('footer_x')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_settings');
    }
};
