<p>{{ $header }}</p>
<br>
<b>Customer:</b>
@foreach (json_decode($user, true) as $userkey => $userdata)
     <li>{{$userkey}}: {{ $userdata }}</li>
@endforeach
<br>
<b>Vehicle:</b>
@foreach (json_decode($vehicle, true) as $vehiclekey => $vehicledata)
     <li>{{$vehiclekey}}: {{ $vehicledata }}</li>
@endforeach
