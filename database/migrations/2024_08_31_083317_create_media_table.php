<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->string('name'); // Name of the media file
            $table->string('type'); // Type of media ('image' or 'video')
            $table->string('escort_id'); 
            $table->timestamps(); // Created at and updated at timestamps
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
