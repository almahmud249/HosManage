<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <div>
        <h1>Thank you, we have recieved your appointment  </h1>
        <p>dear {{$user->name}},</p>
        <p>WE will be notified when your appointment ge approved by the doctor, seat tight and wait for the approval email</p>

        <span>appointment take palace on <h2>{{$user->date}} With Dr. {{ $user->doctor }}</h2></span>
       {{-- <a href="{{URL::to('veryfi/'.$user[0]['email_verified_token'])}}">{{URL::to('veryfi/'.$user[0]['email_verified_token'])}}></a> --}}
       if you have any question brfore your appointment please contact with us in the below number and get in touch with us.
       <h2>01829610249</h2>
    </div>
</body>
</html>
