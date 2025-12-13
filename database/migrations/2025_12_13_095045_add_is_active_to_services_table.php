<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // sort_order: used for ordering services
            $table->integer('sort_order')
                  ->default(0)
                  ->after('order');      // place it after existing "order" column

            // is_active: for enabling/disabling services
            $table->boolean('is_active')
                  ->default(true)
                  ->after('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['sort_order', 'is_active']);
        });
    }
};
