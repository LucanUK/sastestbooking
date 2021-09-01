<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Bookings extends Model
{
    use AsSource;
    protected $table = 'bookings';
    /**
     * @var array
     */
    protected $fillable = [
        'Date',
        'Time',
        'FirstName',
        'LastName',
        'Attended',
        'Completed',
        'MemberID',
        'PhoneNumber',
        'Email',
        'registrationNumber',

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
        'Date',
        'FirstName',
        'LastName',
        'Attended',
        'Completed',
        'MemberID',
        'PhoneNumber',
        'Email',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'registrationNumber',
        'Date',
        'updated_at',
        'created_at',
    ];
}
