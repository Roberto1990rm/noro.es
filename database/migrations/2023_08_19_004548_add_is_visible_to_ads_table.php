<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsVisibleToAdsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->boolean('is_visible')->default(true); // Agregar la columna is_visible
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn('is_visible'); // Eliminar la columna is_visible
        });
    }
}
