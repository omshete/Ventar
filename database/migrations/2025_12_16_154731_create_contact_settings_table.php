<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->default('Contact Us');
            $table->text('intro_text')->nullable();

            $table->string('email_label')->default('Email');
            $table->string('email_value')->nullable();

            $table->string('phone_label')->default('Phone');
            $table->string('phone_value')->nullable();

            // where to send the form data
            $table->string('send_to_email')->nullable();

            $table->boolean('is_active')->default(1);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_settings');
    }
};
