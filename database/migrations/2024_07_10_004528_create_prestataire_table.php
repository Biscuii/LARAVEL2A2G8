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
        Schema::dropIfExists('prestataires');
        Schema::dropIfExists('prestataire');

        Schema::create('prestataire', function (Blueprint $table) {
            $table->id('id_prestataire');
            $table->string('description');
            $table->string('domaine');
            $table->boolean('valide_profile')->default(false);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->default('France');
            $table->integer('experience_years')->nullable();
            $table->string('certifications')->nullable();
            $table->string('specialties')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->boolean('availability')->default(true);
            $table->decimal('rating', 3, 2)->nullable();
            $table->integer('reviews')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
