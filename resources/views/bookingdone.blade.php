@extends('layouts.bookingconfirm')

@section('title')
Booking Completed
@endsection

@section('content')
<h3 class="prev-indent-bot">
    SAS - MOT Booking Completed
</h3>
                      <div class="wrapper img-indent-bot">
                        <div class="extra-wrap">
                          <h4>Your MOT is now booked </h4>
                      </div>
                      <form method="POST" action="{{ route('bookingdone') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <h6>Booking Info</h6>
                            <label for="registrationNumber">Booking Date </label>
                            <input type="text" placeholder="{{ $userdata['bookingdate'] }}" id="bookingdate" name="bookingdate" class="form-control"  readonly
                                autofocus><br>
                                <label for="registrationNumber">Booking Timeslot </label>
                                <input type="text" placeholder="{{ $userdata['timeslot'] }}" id="timeslot" name="timeslot" class="form-control"  readonly
                                autofocus><br>
                            <label for="make">Name </label>
                            <input type="text" placeholder="{{ $userdata['FirstName'] }} {{ $userdata['LastName'] }}" id="Name" name="Name" class="form-control"  readonly
                                    autofocus><br>
                                    <label for="registrationNumber">Registration </label>
                                    <input type="text" placeholder="{{ $vehicledata->registrationNumber }}" id="registrationNumber" name="registrationNumber" class="form-control"  readonly
                                        autofocus><br>
                                    <label for="make">Make </label>
                                    <input type="text" placeholder="{{ $vehicledata->make }}" id="make" name="make" class="form-control"  readonly
                                            autofocus><br>
                                    <label for="make">Colour </label>
                                    <input type="text" placeholder="{{ $vehicledata->colour }}" id="colour" name="colour" class="form-control"  readonly
                                            autofocus><br>
                                    <label for="make">Year </label>
                                    <input type="text" placeholder="{{ $vehicledata->yearOfManufacture }}" id="yearOfManufacture" name="yearOfManufacture" class="form-control"  readonly
                                                    autofocus><br>
                            
                        </div>
                    </form>
                <form method="GET" action="{{ route('booking') }}">
                        @csrf

                        <div class="d-grid mx-auto">
                            <button type="submit" class="button">Back</button>
                        </div>
                    </form>
@endsection
