<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('work_phone');
            $table->string('personal_phone')->nullable();
            $table->string('image_name');
            $table->string('sex');
            $table->string('ID_number');
            $table->text('address');
            $table->string('nationality');
            $table->string('passport')->nullable();
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('marital_status');
            $table->smallInteger('children')->nullable();
            $table->text('emergency_contact')->nullable();
            $table->smallInteger('status');

            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
