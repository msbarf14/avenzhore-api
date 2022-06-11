<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('born_place');
            $table->date('born_date');
            $table->enum('gender', ['male', 'female']);
            $table->timestamps();
        }); 

        Schema::create('member_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->tinyInteger('province_id');
            $table->tinyInteger('city_id');
            $table->tinyInteger('district_id');
            $table->tinyInteger('subdistrict_id');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });

        Schema::create('member_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id');
            $table->string('type');
            $table->string('field');
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
        Schema::dropIfExists('members');
        Schema::dropIfExists('member_addresses');
        Schema::dropIfExists('member_contacts');
    }
}
