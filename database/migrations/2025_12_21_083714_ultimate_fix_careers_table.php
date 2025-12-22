<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('careers', function (Blueprint $table) {
            // Fix short_description - make nullable or add default
            if (Schema::hasColumn('careers', 'short_description')) {
                $table->text('short_description')->nullable()->change();
            }
            
            // Ensure ALL required columns exist and are nullable/defaulted
            if (!Schema::hasColumn('careers', 'title')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('careers', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('careers', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('careers', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('careers', 'icon')) {
                $table->string('icon')->default('work');
            }
        });
    }

    public function down() {
        // No destructive changes
    }
};
