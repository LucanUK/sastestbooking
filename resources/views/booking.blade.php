@extends('layouts.app')

@section('title')
Booking
@endsection

@section('headerscripts')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css" /> 
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
       var enableDays = [''];
       var disabledDays = ['2021-09-02', '2021-09-06'];
    
       function formatDate(d) {
         var day = String(d.getDate())
         //add leading zero if day is is single digit
    
         if (day.length == 1)
           day = '0' + day
         var month = String((d.getMonth()+1))
         //add leading zero if month is is single digit
         if (month.length == 1)
           month = '0' + month
         return d.getFullYear() + '-' + month + "-" + day;
       }
    
       $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
             beforeShowDay: function(date){
              var dayNr = date.getDay();
                if (dayNr==0){
                    if (enableDays.indexOf(formatDate(date)) >= 0) {
                        return true;
                    }
                    return false;
                }
                if (disabledDays.indexOf(formatDate(date)) >= 0) {
                   return false;
                }
                return true;
            }
       });
    });
    </script>
@endsection

@section('content')
<h3 class="prev-indent-bot">
    SAS - MOT Booking & Login
</h3>
                      <div class="wrapper img-indent-bot">
                        <div class="extra-wrap">
                          <h6>Members - Please login to the right to manage your vehicle(s).  </h6>
                          <p>New Vistors - Book in with the form below and choose to register for membership!</p>
                      </div>
                      
                      <form method="POST" action="{{ route('vehicle.apicheck') }}">
                        @csrf
                        
                        <div class="form-group">
                        <label>Date:</label>
                           <input type="text"  name="date" id="date" class="datepicker form-control" autocomplete="on" autoclose="true">
                        
                        <br>
                            Vehicle Registration 
                            <input type="text" placeholder="AA59MOT" id="registrationNumber" class="form-control" name="registrationNumber" required>
                            @if ($errors->has('registrationNumber'))
                            <span class="text-danger">{{ $errors->first('registrationNumber') }}</span>
                            @endif
                        <br>
                        First Name 
                            <input type="text" placeholder="First Name" id="FirstName" class="form-control" name="FirstName" required>
                            @if ($errors->has('FirstName'))
                            <span class="text-danger">{{ $errors->first('FirstName') }}</span>
                            @endif
                            <br>
                        Last Name 
                            <input type="text" placeholder="Last Name" id="LastName" class="form-control" name="LastName" required>
                            @if ($errors->has('LastName'))
                            <span class="text-danger">{{ $errors->first('LastName') }}</span>
                            @endif
                            <br>
                        Phone Number 
                            <input type="text" placeholder="Phone Number" id="PhoneNumber" class="form-control" name="PhoneNumber" required>
                            @if ($errors->has('PhoneNumber'))
                            <span class="text-danger">{{ $errors->first('PhoneNumber') }}</span>
                            @endif
                            <br>
                        Email 
                            <input type="text" placeholder="Email" id="Email" class="form-control" name="Email" required>
                            @if ($errors->has('Email'))
                            <span class="text-danger">{{ $errors->first('Email') }}</span>
                            @endif
                            <br>


                        </div>
                        <div class="d-grid mx-auto">
                            <button type="submit" class="button">Book</button>
                        </div>
                    </form>
@endsection

@section('sidebar')
<main class="login-form">
    
                    <h4 >Member Login</h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="button">Sign In</button>
                            </div>
                        </form>

                    </div>
               
        
    
</main>
@endsection
