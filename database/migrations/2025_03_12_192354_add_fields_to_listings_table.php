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
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('area');
            $table->tinyText('city')->nullable();
            $table->tinyText('code')->nullable();
            $table->tinyText('street')->nullable();
            $table->tinyText('street_nr')->nullable();

            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('listings', function (Blueprint $table) {
        //     $table->drop
        // });
        Schema::dropColumns('listings', ['beds', 'baths', 'area', 'city', 'code', 'street', 'street_nr', 'price']);
    }
};
