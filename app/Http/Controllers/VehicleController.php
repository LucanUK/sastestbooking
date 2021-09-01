<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLookup;
use App\Models\Timeslots;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;

class VehicleController extends Controller
{
    //

    public function checkAPI(Request $request)
    {
        $request->validate([
            'registrationNumber' => 'required',
        ]);

        $vehiclereg = $request->get('registrationNumber');
        $userdata = array('bookingdate' => $request->get('date'),'timeslot' => $request->get('time'),'FirstName' => $request->get('FirstName'), 'LastName' => $request->get('LastName'), 'PhoneNumber' => $request->get('PhoneNumber'),'Email' => $request->get('Email'));
        Session(['userdata' => $userdata]);
        
         $curl = curl_init();
         $DVLSAPIKEY = env('DVLA_APIKEY', null);
        curl_setopt_array($curl, array(
         CURLOPT_URL => "https://driver-vehicle-licensing.api.gov.uk/vehicle-enquiry/v1/vehicles",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS =>"{\n\t\"registrationNumber\": \"$vehiclereg\"\n}",
         CURLOPT_HTTPHEADER => array(
             "x-api-key: $DVLSAPIKEY",
             "Content-Type: application/json"
         ),
         ));

         $response = curl_exec($curl);

         curl_close($curl);
        
        $vehicle = New VehicleLookup;
        $JSONObject = json_decode($response,true);
        if (array_key_exists('registrationNumber', $JSONObject)) {
            $vehicle->fill($JSONObject)->save();
            Session(['vehicleid' => $vehicle->id]);
            return  redirect()->route('bookingconfirm');
        } else {
            return;
        }     
        
    }
}
