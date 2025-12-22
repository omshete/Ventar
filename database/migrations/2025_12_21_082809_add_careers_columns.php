<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('careers', function (Blueprint $table) {
            // Add ALL missing columns
            if (!Schema::hasColumn('careers', 'description')) {
                $table->text('description')->after('title');
            }
            if (!Schema::hasColumn('careers', 'location')) {
                $table->string('location')->after('description');
            }
            if (!Schema::hasColumn('careers', 'type')) {
                $table->string('type')->after('location');
            }
            if (!Schema::hasColumn('careers', 'icon')) {
                $table->string('icon')->default('work')->after('type');
            }
            if (!Schema::hasColumn('careers', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('icon');
            }
            if (!Schema::hasColumn('careers', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('sort_order');
            }
        });
    }

    public function down() {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn(['description', 'location', 'type', 'icon', 'sort_order', 'is_active']);
        });
    }
};
