<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_xx_xx_create_hashtags_table.php

public function up()
{
    Schema::create('hashtags', function (Blueprint $table) {
        $table->id();
        $table->string('tag'); // Nombre del hashtag
        $table->unsignedBigInteger('ad_id'); // Referencia al ID del anuncio
        $table->timestamps();

        // Definir la relación con la tabla ads
        $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtags');
    }
};
