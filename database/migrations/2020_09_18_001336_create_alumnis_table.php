<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string("full_name");
            $table->string("master_number")->nullable();
            $table->string("birthplace");
            $table->string("dateplace");
            $table->string("fathers_name")->nullable();
            $table->string("mothers_name")->nullable();
            $table->string("address")->nullable();
            $table->string("entry_year")->nullable();
            $table->string("hp")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("accepted_class")->nullable();
            $table->string("word")->nullable();
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
        Schema::dropIfExists('alumnis');
    }
}
