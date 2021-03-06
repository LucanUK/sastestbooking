<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('Date');
            $table->string('Time');
            $table->string('FirstName');
            $table->string('LastName');
            $table->integer('Attended')->default(0);
            $table->integer('Completed')->default(0);
            $table->integer('MemberID')->nullable(true)->default(NULL);
            $table->string('PhoneNumber');
            $table->string('Email')->nullable(true)->default(NULL);
            $table->string('registrationNumber');
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
        Schema::dropIfExists('bookings');
    }
}
