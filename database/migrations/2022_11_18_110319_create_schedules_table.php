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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignID('DoctorFIO_id')->constrained('doctors');
            $table->datetime('receptionStartTime');
            $table->foreignId('receptionTime_id')->constrained('receptions');
            $table->datetime('receptionEndTime');
            $table->dateTime('receptionDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
