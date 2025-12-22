<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('careers', function (Blueprint $table) {
            // Fix ALL problematic columns - make them nullable
            $columns = ['short_description', 'experience'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('careers', $column)) {
                    $table->$column()->nullable()->change();
                }
            }
        });
    }
    
    public function down() {
        // Safe rollback
    }
};
