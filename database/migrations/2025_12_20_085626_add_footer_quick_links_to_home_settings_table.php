<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->text('footer_quick_links')->nullable()->after('footer_instagram');
        });
    }

    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn('footer_quick_links');
        });
    }
};
