@extends('layouts.bookingconfirm')

@section('title')
Booking Confirm
@endsection

@section('content')
<h3 class="prev-indent-bot">
    SAS - MOT Booking Confirm
</h3>
                      <div class="wrapper img-indent-bot">
                        <div class="extra-wrap">
                          <h4>Confirm Your Booking Details </h4>
                      </div>
                      <form method="POST" action="{{ route('bookingdone') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <h6>Booking Info</h6>
                            <label for="registrationNumber">Booking Date </label>
                            <input type="text" placeholder="{{ $userdata['bookingdate'] }}" id="bookingdate" name="bookingdate" class="form-control"  disabled
                                autofocus><br>
                            <label for="make">Name </label>
                            <input type="text" placeholder="{{ $userdata['FirstName'] }} {{ $userdata['LastName'] }}" id="Name" name="Name" class="form-control"  disabled
                                    autofocus><br>
                            <label for="make">Phone Number </label>
                            <input type="text" placeholder="{{ $userdata['PhoneNumber'] }}" id="PhoneNumber" name="PhoneNumber" class="form-control"  disabled
                                    autofocus><br>
                            <label for="make">Email </label>
                            <input type="text" placeholder="{{ $userdata['Email'] }}" id="Email" name="Email" class="form-control"  disabled
                                            autofocus><br>
                            
                        </div>

                        <div class="form-group mb-3">
                            <br>
                            <h6>Vehicle Info</h6>
                            <label for="registrationNumber">Registration </label>
                            <input type="text" placeholder="{{ $vehicledata->registrationNumber }}" id="registrationNumber" name="registrationNumber" class="form-control"  disabled
                                autofocus><br>
                            <label for="make">Make </label>
                            <input type="text" placeholder="{{ $vehicledata->make }}" id="make" name="make" class="form-control"  disabled
                                    autofocus><br>
                            <label for="make">Colour </label>
                            <input type="text" placeholder="{{ $vehicledata->colour }}" id="colour" name="colour" class="form-control"  disabled
                                    autofocus><br>
                            <label for="make">Year </label>
                            <input type="text" placeholder="{{ $vehicledata->yearOfManufacture }}" id="yearOfManufacture" name="yearOfManufacture" class="form-control"  disabled
                                            autofocus><br>
                            <label for="make">Fuel Type </label>
                            <input type="text" placeholder="{{ $vehicledata->fuelType }}" id="fuelType" name="fuelType" class="form-control"  disabled
                                            autofocus><br>
                            <label for="make">Engine Size </label>
                            <input type="text" placeholder="{{ $vehicledata->engineCapacity }}" id="engineCapacity" name="engineCapacity" class="form-control"  disabled
                                                            autofocus><br>
                            <label for="make">MOT Status </label>
                            <input type="text" placeholder="{{ $vehicledata->motStatus }}" id="motStatus" name="motStatus" class="form-control"  disabled
                                                            autofocus><br>
                            <label for="make">MOT Expiry </label>
                            <input type="text" placeholder="{{ $vehicledata->motExpiryDate }}" id="motExpiryDate" name="motExpiryDate" class="form-control"  disabled
                                                autofocus><br>
                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="button">Confirm</button>
                        </div>
                    </form>
                <form method="GET" action="{{ route('booking') }}">
                        @csrf

                        <div class="d-grid mx-auto">
                            <button type="submit" class="button">Back</button>
                        </div>
                    </form>
@endsection
