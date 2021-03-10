<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('reason');
            $table->unsignedTinyInteger('type');
            $table->date('begin');
            $table->date('end');
            $table->date('requested_date');
            $table->unsignedTinyInteger('status');

            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('approver_id')->nullable()->constrained('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
