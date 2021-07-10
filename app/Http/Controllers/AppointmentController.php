<?php

namespace App\Http\Controllers;

use IdGenerator;
use App\Mail\Verify;
use App\Models\User;
use App\Helpers\helper;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\NotifyAdmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;



class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllAppointmentPage()
    {
        $dt=DB::table('appointments')->get();
        return view('appointment.allAppointment',compact('dt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InsertAppointmentForm()
    {
        return view('appointment.appoinmentForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InsertAppointmentData(Request $request)
    {
        $validation=$request->validate([
            'name'=>'required',
            'doctor'=>'required',
            'department'=>'required',
            'date'=>'required',

            'email'=>'required',
            'phone'=>'required',

        ]);
        //  $apmntId=Helper::IdGenerator(new Appointment,'apmntId', 5, 'AP');

        // $data=Appointment::create([

        //     'name'=>$request->name,
        //     'doctor'=>$request->doctor,
        //     'department'=>$request->department,
        //     'date'=>$request->date,
        //     'time'=>$request->time,
        //     'email'=>$request->email,
        //     'phone'=>$request->phone,
        //     'message'=>$request->message,
        //     'apmntId'=>$apmntId,
        //     'email_verified' => 1,
        //     'email_verified_token' => str::random(32),


        // ]);
        $data=array([



            'name'=>$request->name,
            'doctor'=>$request->doctor,
            'department'=>$request->department,
            'date'=>$request->date,
            'time'=>$request->time,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
            // 'apmntId'=>$apmntId,
            'email_verified' => 1,
            'email_verified_token' => str::random(32),


        ]);


        DB::table('appointments')->insert($data);


        if ($data) {

            Mail::to($data[0]['email'])->send(new Verify($data));
            $admin = User::find(1);
            $admin->notify(new NotifyAdmin($data));

            $notification = array(
                'message' => 'Successfully data Added',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function EditAppointmentData($id)
    {

        $dt=DB::table('appointments')->where('id',$id)->first();

        return view('appointment.editForm',compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function UpdateAppointmentData(Request $request,$id)
    {
        $validation=$request->validate([
            'name'=>'required',
            'doctor'=>'required',
            'department'=>'required',
            'date'=>'required',
            'time'=>'required',
            'email'=>'required',
            'phone'=>'required',

        ]);

        $data=Appointment::where('id',$id)->update([

            'name'=>$request->name,
            'doctor'=>$request->doctor,
            'department'=>$request->department,
            'date'=>$request->date,
            'time'=>$request->time,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,


        ]);


        if ($data) {
            $notification = array(
                'message' => 'Successfully data Updated',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function DeleteAppointmentData($id)
    {
        $data=Appointment::find($id)->delete();

        if ($data) {
            $notification = array(
                'message' => 'Successfully data Deleted',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.appointment.page')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    // public function OnlineAppointmentData(Request $request)
    // {
    //     $validation=$request->validate([
    //         'name'=>'required',
    //         'doctor'=>'required',
    //         'department'=>'required',
    //         'date'=>'required',
    //         'time'=>'required',
    //         'email'=>'required',
    //         'phone'=>'required',

    //     ]);
    //     //  $apmntId=Helper::IdGenerator(new Appointment,'apmntId', 5, 'AP');

    //     $data=Appointment::create([

    //         'name'=>$request->name,
    //         'doctor'=>$request->doctor,
    //         'department'=>$request->department,
    //         'date'=>$request->date,
    //         'time'=>$request->time,
    //         'email'=>$request->email,
    //         'phone'=>$request->phone,
    //         'message'=>$request->message,
    //         // 'apmntId'=>$apmntId


    //     ]);

    //     if ($data) {
    //         // Session::put('message', 'patients added successfully ');
    //         session()->flash('message', 'Your appointment request has been sent, please check your email ');
    //         // mail::to($data->email)->send(new VerificationEmail($data));
    //         // $admin = DashBoard::find(1);
    //         // $admin->notify(new NotifyAdmin($data));

    //         return redirect()->back();
    //     } else {

    //     }

    // }


    public function AppointmentApprove(Request $request,$id){

        $data=Appointment::where('id',$request->id)->update([
            'isApprove'=>1
        ]);

        if ($data) {
            $notification = array(
                'message' => 'Successfully Appointment Approve',
                'alert-type' => 'success',
            );
            return Redirect()->route('dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );

            return Redirect()->route('dashboard')->with($notification);
        }


    }


  
}
