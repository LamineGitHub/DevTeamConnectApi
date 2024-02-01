<?php

use App\Models\Service;
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
        Schema::create('employers', static function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('matricule')->unique();

            $table->string('prenom');

            $table->string('nom');

            $table->string('tel', 100);

            $table->string('email');

            $table->unsignedInteger('salaire');

            $table->date('dateNaiss');

            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
