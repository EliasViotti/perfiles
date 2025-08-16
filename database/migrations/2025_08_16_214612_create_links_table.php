<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            //usuario
            $table->foreignId('id_usuario')
                  ->constrained('usuarios') 
                  ->onDelete('cascade'); 
            //tipo de link
            $table->foreignId('id_tipo_link')
                  ->constrained('tipo_links') 
                  ->onDelete('cascade'); 
            
            $table->string('url', 500);   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
