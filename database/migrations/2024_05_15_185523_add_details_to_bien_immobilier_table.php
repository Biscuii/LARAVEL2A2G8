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
        Schema::table('bien_immobiliers', function (Blueprint $table) {
            // Ajouter uniquement les nouvelles colonnes
            $table->integer('nombre_de_chambres');
            $table->integer('nombre_de_salles_de_bain');
            $table->integer('superficie');
            $table->string('type_de_bien');
            $table->integer('nombre_de_lits');
            $table->integer('capacite_max');
            $table->boolean('wifi')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('climatisation')->default(false);
            $table->boolean('chauffage')->default(false);
            $table->boolean('cuisine')->default(false);
            $table->boolean('animaux_acceptes')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bien_immobiliers', function (Blueprint $table) {
            $table->dropColumn([
                'nombre_de_chambres',
                'nombre_de_salles_de_bain',
                'superficie',
                'type_de_bien',
                'nombre_de_lits',
                'capacite_max',
                'wifi',
                'parking',
                'climatisation',
                'chauffage',
                'cuisine',
                'animaux_acceptes'
            ]);
        });
    }
};
