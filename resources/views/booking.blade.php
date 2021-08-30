@extends('layouts.app')

@section('title')
Booking
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
