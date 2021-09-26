<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLookup;
use App\Models\Bookings;
use Orchid\Platform\Models\User;
use Orchid\Platform\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
#use Hash;
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

    public function bookingdone(Request $request)
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
        Mail::send('bookingmail', $maildata, function($message) use ( $mailto, $mailsubject ) {
            $message->to($mailto)->subject($mailsubject);
         });

        $mailheader = "An MOT Booking for  " . $vehicledata->registrationNumber . " has been received";
        $mailuser = $userdata;
        $maildata = array('header' => $mailheader, 'user' => json_encode($userdata,true), 'vehicle' => json_encode($vehicledata,true), 'name' => $userdata['FirstName']);
        $mailto = "booking@lucanops.net";
        #$mailto = "service@sastestandrepair.co.uk";
        $mailsubject = "MOT Booking - " . $userdata['bookingdate'] . " @ " . $userdata['timeslot'];
        #dd(config('mail'));
        #dd($maildata);
        Mail::send('bookingmailadmin', $maildata, function($message) use ( $mailto, $mailsubject ) {
            $message->to($mailto)->subject($mailsubject);
         });


         $membership = $request->get('membership');
        $password = $request->get('password');

        $userData = $request->get('user');
        if ($password === '' || $membership == false ) {
            // When updating existing user null password means "do not change current password"
            unset($password);
        } else {
            $passwordhash = Hash::make($password);
            $newuserid = $this->adduser($passwordhash);
            
            $mailheader = "You have registered for SAS Membership";
            $mailuser = $userdata;
            $maildata = array('header' => $mailheader, 'user' => json_encode($userdata,true), 'name' => $userdata['FirstName'], 'email' => $userdata['Email'], 'password' => $password);
            $mailto = $userdata['Email'];
            $mailsubject = "SAS Test & Repair - Booking Membership";
            #dd(config('mail'));
            #dd($maildata);
            Mail::send('membershipmail', $maildata, function($message) use ( $mailto, $mailsubject ) {
                $message->to($mailto)->subject($mailsubject);
             });

        }
        #dd($newuserid);
        $booking->fill([ 'MemberID' => $newuserid,])->save();
        return view('bookingdone')->with('vehicledata', $vehicledata)->with('userdata', $userdata);
    }
    public function adduser(String $passwordhash)
    {
        $newuser = new User();
        $userdata = Session('userdata');

        $newuserarray = array('name' => $userdata['FirstName'] . " ". $userdata['LastName']);
        $newuserarray = Arr::add($newuserarray, 'email', $userdata['Email']);
        $newuserarray = Arr::add($newuserarray, 'password', $passwordhash);
        $permissions = json_decode('{"platform.systems.access":"0","platform.systems.attachment":"0","platform.systems.roles":"0","platform.systems.users":"0","platform.main.examples":"0","platform.index":"0"}');
        #dd($newuserarray);
        #$newuserarray->validate([
        #    'email' => [
        #        'required',
        #        Rule::unique(User::class, 'email')->ignore($newuser),
        #    ],
        #]);
        $newuser
        ->fill($newuserarray)
        ->save();

        $newuser->replaceRoles(array("3"));

        return $newuser->id;
    }
}
