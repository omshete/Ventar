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
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('career_title')->nullable()->after('intro_text');
            $table->text('career_description')->nullable()->after('career_title');
            $table->string('career_button_text')->nullable()->after('career_description');
            $table->string('career_button_link')->nullable()->after('career_button_text');
        });
    }

    public function down()
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn(['career_title', 'career_description', 'career_button_text', 'career_button_link']);
        });
    }

};
