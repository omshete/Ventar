<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            // Add these only if they do not already exist
            if (! Schema::hasColumn('home_settings', 'footer_company')) {
                $table->string('footer_company')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_description')) {
                $table->text('footer_description')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_email')) {
                $table->string('footer_email')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_phone')) {
                $table->string('footer_phone')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_address')) {
                $table->string('footer_address')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_x')) {
                $table->string('footer_x')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_linkedin')) {
                $table->string('footer_linkedin')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_facebook')) {
                $table->string('footer_facebook')->nullable();
            }
            if (! Schema::hasColumn('home_settings', 'footer_instagram')) {
                $table->string('footer_instagram')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn([
                'footer_company',
                'footer_description',
                'footer_email',
                'footer_phone',
                'footer_address',
                'footer_x',
                'footer_linkedin',
                'footer_facebook',
                'footer_instagram',
            ]);
        });
    }
};
