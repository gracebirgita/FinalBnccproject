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
        Schema::table('toys', function (Blueprint $table) {
            if(!Schema::hasColumn('toys', 'price')) {
                $table->decimal('price', 10, 2)->after('stock');
            }
        });
    }

    public function down()
    {
        Schema::table('toys', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
