<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLookup;
use Hash;
use Session;

class BookingController extends Controller
{
    public function bookingconfirm()
    {
        $vehicleid = Session('vehicleid');
        $vehicledata = VehicleLookup::find($vehicleid);
        Session(['vehicledata' => $vehicledata]);
        $userdata = Session('userdata');

        return view('bookingconfirm')->with('vehicledata', $vehicledata)->with('userdata', $userdata);
    }
}
