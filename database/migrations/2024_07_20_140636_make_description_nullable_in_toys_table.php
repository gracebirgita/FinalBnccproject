<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeDescriptionNullableInToysTable extends Migration
{
    public function up()
    {
        Schema::table('toys', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('toys', function (Blueprint $table) {
            $table->string('description', 255)->nullable(false)->change();
        });
    }
    
}
