<?php

namespace App\Http\Controllers;

use App\Mail\scheduleMail;
use App\Mail\Verify;
use App\Models\Appointment;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(AuthenticationException $exception)
    {
        return view('home');
    }

    public function AptOnline(Request $request)
    {
        // dd('hello');
        $validation = $request->validate([
            'name' => 'required',
            'doctor' => 'required',
            'department' => 'required',
            'date' => 'required',

            'email' => 'required',
            'phone' => 'required',

        ]);
        //   $apmntId=Helper::IdGenerator(new Appointment,'apmntId', 5, 'AP');

        $data = array([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'time' => $request->input('time'),
            'date' => $request->input('date'),
            'department' => $request->input('department'),
            'doctor' => $request->input('doctor'),
            // 'apmntId'=>$apmntId,
            'email_verified' => 1,
            'email_verified_token' => str::random(32),

        ]);

        DB::table('appointments')->insert($data);

        if ($data) {
            // Session::put('message', 'patients added successfully ');
            session()->flash('message', 'Your appointment request has been sent, please check your email ');
            Mail::to($data[0]['email'])->send(new Verify($data));
            $admin = User::find(1);
            $admin->notify(new NotifyAdmin($data));

            return redirect()->back();
        } else {

        }
    }

    public function ReScheduleForm(Request $request, $id)
    {
        $dt = DB::table('appointments')->where('id', $request->id)->first();

        return view('appointment.ApptSchedule', compact('dt'));
    }

    public function AppointmentReSchedule(Request $request, $id)
    {

        //   $apmntId=Helper::IdGenerator(new Appointment,'apmntId', 5, 'AP');

        $data = DB::table('appointments')->where('id', $request->id)->update([
            'time' => $request->time,
            'date' => $request->date,
        ]);
        $user = Appointment::where('id', $request->id)->first();



        if ($data) {
            $notification = array(
                'message' => 'Successfully Appointment Approve',
                'alert-type' => 'success',
            );

            Mail::to($user->email)->send(new scheduleMail($user));
            //  $admin = User::find(1);
            //  $admin->notify(new NotifyAdmin($data));

            return Redirect()->route('dashboard')->with($notification);
        } else {

        }

    }
}
