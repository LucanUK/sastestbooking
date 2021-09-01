<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLookup;
use App\Models\Bookings;
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

    public function bookingdone()
    {
        $vehicledata = Session('vehicledata');
        $userdata = Session('userdata');
        $bookingdata = array("Date" => $userdata['bookingdate'],"Time" => $userdata['timeslot'], "FirstName" => $userdata['FirstName'],"LastName" => $userdata['LastName'],"PhoneNumber" => $userdata['PhoneNumber'],"Email" => $userdata['Email'],"registrationNumber" => $vehicledata->registrationNumber );
        $booking = New Bookings;
        $booking->fill($bookingdata)->save();
        return view('bookingdone')->with('vehicledata', $vehicledata)->with('userdata', $userdata);
    }
}
