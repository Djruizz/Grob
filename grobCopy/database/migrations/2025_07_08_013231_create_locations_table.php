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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. MONTERREY
            $table->string('street'); // e.g. Libramiento Noreste #9239
            $table->string('neighborhood')->nullable(); // e.g. Parque Industrial Mitras
            $table->string('postal_code', 10)->nullable(); // e.g. 66023
            $table->string('city')->nullable(); // e.g. García
            $table->string('state')->nullable(); // e.g. Nuevo León
            $table->string('phone')->nullable(); // e.g. (81) 8047-2000
            $table->string('email_1')->nullable(); // e.g. gzz1.govi...
            $table->string('email_2')->nullable(); // e.g. tmk1.govi...
            $table->decimal('lat', 10, 7)->nullable(); // coordinates
            $table->decimal('lng', 10, 7)->nullable();
            $table->text('map_url')->nullable(); // full Google Maps link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
