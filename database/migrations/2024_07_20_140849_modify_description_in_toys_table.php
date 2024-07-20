<?php

// database/migrations/xxxx_xx_xx_xxxxxx_modify_description_in_toys_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDescriptionInToysTable extends Migration
{
    public function up()
    {
        Schema::table('toys', function (Blueprint $table) {
            // Increase the length and make the column nullable
            $table->text('description')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('toys', function (Blueprint $table) {
            // Revert to original type if needed
            $table->string('description', 255)->nullable(false)->change();
        });
    }
}
