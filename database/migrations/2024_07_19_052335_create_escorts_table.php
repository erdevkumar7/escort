<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escorts', function (Blueprint $table) {
            $table->id();
            $table->string('nickname')->unique();
            $table->json('pictures');
            $table->string('phone_number');
            $table->string('age');
            $table->string('canton');
            $table->string('city');
            $table->json('services');
            $table->string('origin');
            $table->string('type');
            $table->text('text_description');

            // Non-Mandatory Elements
            $table->json('video')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('hair_length')->nullable();
            $table->string('breast_size')->nullable();
            $table->unsignedSmallInteger('height')->nullable();
            $table->unsignedSmallInteger('weight')->nullable();
            $table->string('build')->nullable();
            $table->boolean('smoker')->default(false);
            $table->json('language_spoken')->nullable();
            $table->string('address')->nullable();
            $table->boolean('outcall')->default(false);
            $table->boolean('incall')->default(false);
            $table->string('whatsapp_number')->nullable();
            $table->json('availability')->nullable();
            $table->boolean('parking')->default(false);
            $table->boolean('disabled')->default(false);
            $table->boolean('accepts_couples')->default(false);
            $table->boolean('elderly')->default(false);
            $table->boolean('air_conditioned')->default(false);
            $table->unsignedDecimal('rates_in_chf', 8, 2)->nullable();
            $table->json('currencies_accepted')->nullable();
            $table->json('payment_method')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escorts');
    }
}
