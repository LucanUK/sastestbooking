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
            $table->integer('co2Emissions')->nullable(true)->default(NULL);
            $table->integer('engineCapacity')->nullable(true)->default(NULL);
            $table->string('markedForExport')->nullable(true)->default(NULL);
            $table->string('fuelType')->nullable(true)->default(NULL);
            $table->string('motStatus')->nullable(true)->default(NULL);
            $table->integer('revenueWeight')->nullable(true)->default(NULL);
            $table->string('colour')->nullable(true)->default(NULL);
            $table->string('make')->nullable(true)->default(NULL);
            $table->string('typeApproval')->nullable(true)->default(NULL);
            $table->integer('yearOfManufacture')->nullable(true)->default(NULL);
            $table->string('taxDueDate')->nullable(true)->default(NULL);
            $table->string('taxStatus')->nullable(true)->default(NULL);
            $table->string('dateOfLastV5CIssued')->nullable(true)->default(NULL);
            $table->string('motExpiryDate')->nullable(true)->default(NULL);
            $table->string('wheelplan')->nullable(true)->default(NULL);
            $table->string('monthOfFirstRegistration')->nullable(true)->default(NULL);
            $table->string('model')->nullable(true)->default(NULL);
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
