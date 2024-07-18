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
               // Mandatory Fields
               $table->string('nickname')->unique();
               $table->text('description')->nullable(); // Assuming free text box
               $table->json('pictures'); // Storing URLs or paths of pictures as JSON
               $table->string('phone_number'); // Validation on format will be handled in the application
               $table->integer('age')->unsigned();
               $table->string('canton');
               $table->string('city');
               $table->json('services'); // Storing selected services as JSON
               $table->enum('origin', ['Caucasian', 'Latin', 'Asian', 'Oriental', 'Black', 'Other']);
               $table->enum('type', ['Independent Escort', 'Escort', 'Trans', 'SM', 'Salon']);
               
               // Non-Mandatory Fields
               $table->json('videos')->nullable(); // Storing URLs or paths of videos as JSON
               $table->enum('hair_color', ['Brunette', 'Blonde', 'Red', 'Auburn', 'Grey', 'Other'])->nullable();
               $table->enum('hair_length', ['Short', 'Medium', 'Long'])->nullable();
               $table->enum('breast_size', ['Small', 'Medium', 'Large'])->nullable();
               $table->integer('height')->unsigned()->nullable();
               $table->integer('weight')->unsigned()->nullable();
               $table->enum('build', ['Slim', 'Normal', 'Chubby', 'Large', 'Muscular'])->nullable();
               $table->boolean('smoker')->nullable();
               $table->json('languages_spoken')->nullable(); // Storing selected languages as JSON
               $table->string('address')->nullable();
               $table->boolean('outcall')->nullable();
               $table->boolean('incall')->nullable();
               $table->string('whatsapp_number')->nullable(); // Validation on format will be handled in the application
               $table->json('availability')->nullable(); // Storing availability details as JSON
               $table->boolean('parking')->nullable();
               $table->boolean('disabled')->nullable();
               $table->boolean('accepts_couples')->nullable();
               $table->boolean('elderly')->nullable();
               $table->boolean('air_conditioned')->nullable();
               $table->integer('rates_in_chf')->unsigned()->nullable();
               $table->json('currencies_accepted')->nullable(); // Storing selected currencies as JSON
               $table->json('payment_methods')->nullable(); // Storing selected payment methods as JSON
               
               // Timestamps
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
