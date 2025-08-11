<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->decimal('award_amount', 12, 2)->nullable()->after('slug');
        });
    }
    public function down()
    {
        Schema::table('scholarships', function (Blueprint $table) {
            $table->dropColumn('award_amount');
        });
    }
};
