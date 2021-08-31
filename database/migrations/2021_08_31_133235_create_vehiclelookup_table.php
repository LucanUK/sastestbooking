<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclelookupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclelookup', function (Blueprint $table) {
            $table->id();
            $table->string('registrationNumber');
            $table->integer('co2Emissions');
            $table->integer('engineCapacity');
            $table->string('markedForExport');
            $table->string('fuelType');
            $table->string('motStatus');
            $table->integer('revenueWeight');
            $table->string('colour');
            $table->string('make');
            $table->string('typeApproval');
            $table->integer('yearOfManufacture');
            $table->string('taxDueDate');
            $table->string('taxStatus');
            $table->string('dateOfLastV5CIssued');
            $table->string('motExpiryDate');
            $table->string('wheelplan');
            $table->string('monthOfFirstRegistration');
            $table->string('model')->nullable(true);
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
        Schema::dropIfExists('vehiclelookup');
    }
}
