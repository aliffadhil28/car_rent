<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->foreignId('cars_id')->constrained();
            $table->string('accessor1');
            $table->string('accessor2');
            $table->enum('status1',['waiting','accepted','rejected'])->default('waiting')->nullable();
            $table->enum('status2',['waiting','accepted','rejected'])->default('waiting')->nullable();
            $table->dateTime('out')->nullable();
            $table->dateTime('in')->nullable();
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
        Schema::dropIfExists('rents');
    }
};
