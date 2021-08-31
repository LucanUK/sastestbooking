<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class VehicleLookup extends Model
{
    use AsSource;
    protected $table = 'vehiclelookup';
    /**
     * @var array
     */
    protected $fillable = [
        'registrationNumber',
        'co2Emissions',
        'engineCapacity',
        'markedForExport',
        'fuelType',
        'motStatus',
        'revenueWeight',
        'colour',
        'make',
        'typeApproval',
        'yearOfManufacture',
        'taxDueDate',
        'taxStatus',
        'dateOfLastV5CIssued',
        'motExpiryDate',
        'wheelplan',
        'monthOfFirstRegistration',
        'model',

    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'registrationNumber',
        'motExpiryDate',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'registrationNumber',
        'motExpiryDate',
        'updated_at',
        'created_at',
    ];
}
