<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLookup;
use App\Models\Bookings;
use Hash;
use Session;
use Mail;

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


        $mailheader = "Your MOT for " . $vehicledata->registrationNumber . " is requested for:";
        $maildate = $userdata['bookingdate'] . " at " . $userdata['timeslot'];
        $maildata = array('header' => $mailheader, 'date' => $maildate, 'name' => $userdata['FirstName']);
        $mailto = $userdata['Email'];
        $mailsubject = "MOT Booking - " . $userdata['bookingdate'] . " @ " . $userdata['timeslot'];
        #dd(config('mail'));
        #dd($maildata);
        #Mail::send('bookingmail', $maildata, function($message) use ( $mailto, $mailsubject ) {
        #    $message->to($mailto)->subject($mailsubject);
        # });

        $mailheader = "An MOT Booking for  " . $vehicledata->registrationNumber . " has been received";
        $mailuser = $userdata;
        $maildata = array('header' => $mailheader, 'user' => json_encode($userdata,true), 'vehicle' => json_encode($vehicledata,true), 'name' => $userdata['FirstName']);
        $mailto = "booking@lucanops.net";
        $mailsubject = "MOT Booking - " . $userdata['bookingdate'] . " @ " . $userdata['timeslot'];
        #dd(config('mail'));
        #dd($maildata);
        Mail::send('bookingmailadmin', $maildata, function($message) use ( $mailto, $mailsubject ) {
            $message->to($mailto)->subject($mailsubject);
         });
        return view('bookingdone')->with('vehicledata', $vehicledata)->with('userdata', $userdata);
    }
}
