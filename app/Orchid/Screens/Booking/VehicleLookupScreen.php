<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Booking;

use App\Orchid\Layouts\Booking\VehicleLookupLayout;

use Illuminate\Http\Request;
use Orchid\Platform\Models\Role;
use App\Models\VehicleLookup;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Alert;


class VehicleLookupScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'DVLA Vehicle Lookup Screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Check DVLA Vehicle Status';

    /**
     * @var string
     */
    public $permission = 'platform.main.vehiclelookup';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(VehicleLookup $vehicles): array
    {
        if ($vehicles != NULL) {
            return [
                'vehicles' => $vehicles,
            ];
        } else {
            return [
                'vehicles' => VehicleLookup::all(),
            ];

        }
    }
    // public function VehicleLookup()
    // {
        
    //     alert('Lookup');
        
        
    //     return;
    // }
    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            // Button::make(__('New Booking'))
            //     ->icon('event')
            //     ->method('BookingNotify'),
        ];
    }
/**
     * Views.
     *
     * @throws \Throwable
     *
     * @return \Orchid\Screen\Layout[]
     */


    public function layout(): array
    {
            
        return [
    Layout::rows([

        Group::make([
            Input::make('vehiclereg')
                        ->title('Vehicle Reg:')
                        ->mask([
                            'mask' => '*******',
                            // 'placeholder' => 'AA12MOT',
                            'casing' => 'upper',
                        ])
                        ->help('Enter a valid UK Car Reg')
                        ->required()
                        
                        ])->autoWidth(),
                   
            Button::make('Search')
                        ->icon('magnifier')
                        ->method('checkAPI')

        //])
        
        

    ]),
    VehicleLookupLayout::class

];
    }

    public function checkAPI(Request $request)
    {
        $vehiclereg = $request->get('vehiclereg');

        //Alert::info('got reg: ' . $vehiclereg);
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
        //$response = '{"registrationNumber":"NP05MTP","co2Emissions":142,"engineCapacity":1984,"markedForExport":false,"fuelType":"PETROL","motStatus":"Valid","revenueWeight":1887,"colour":"BLACK","make":"SKODA","typeApproval":"M1","yearOfManufacture":2016,"taxDueDate":"2022-01-01","taxStatus":"Taxed","dateOfLastV5CIssued":"2016-01-19","motExpiryDate":"2022-02-02","wheelplan":"2 AXLE RIGID BODY","monthOfFirstRegistration":"2016-01"}';

        //Alert::info('Data: ' . $response);
        $vehicle = New VehicleLookup;
        $JSONObject = json_decode($response,true);
        if (array_key_exists('registrationNumber', $JSONObject)) {
            $vehicle->fill($JSONObject)->save();
            return redirect()->route('platform.main.vehiclelookup.show', $vehicle->id);
        } else {
            Alert::warning('Reg: ' . $vehiclereg . ' NOT FOUND!');
            return redirect()->route('platform.main.vehiclelookup');
        }     
        
    }
}
