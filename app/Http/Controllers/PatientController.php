<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllPatientPage()
    {
        $dt = DB::table('patients')->get();
        return view('patient.allPatients', compact('dt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InsertPatientForm()
    {
        return view('patient.patientForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InsertPatientData(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'date' => 'required',
            'email' => 'required|unique:patients',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'phone' => 'required',

            'country' => 'required',
            'address' => 'required',

        ]);
        // $patients_id = Helper::IdGenerator(new addpatients, 'patients_id', 5, 'DR');
        $data = Patient::create([

            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),

            'status' => $request->input('status'),

            'email_verified_token' => str::random(32),
            'email_verified' => 1,
            // 'patients_id' => $patients_id,

        ]);
        //mail::to($data->email)->send(new VerificationEmail($data));
        // $admin = DashBoard::find(1);

        // $admin->notify(new NotifyPatients($data));

        if ($data) {
            $notification = array(
                'message' => 'Successfully data inserted',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function EditPatientData($id)
    {
        $dt = DB::table('patients')->where('id', $id)->first();
        return view('patient.editPatient', compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function UpdatePatientData(Request $request, Patient $patient, $id)
    {



        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'date' => 'required',
            'email' => 'required',
            // 'email' => 'required|email|unique:patients,email,'.$patient->id,
            // 'email' => ['required', Rule::unique('patients')->ignore($this->patient->id)],
            // 'email' => 'required|unique:patients,email,'.$this->user_id,
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'phone' => 'required',

            'country' => 'required',
            'address' => 'required',

        ]);

        if ($request->get('email')) {
            $email = $request->get('email');
            $data = DB::table("patients")
                ->where('email', $email)->first();
            $id1 = $data->id;
            $id2 = $request->id;

            if ($id1 == $id2) {
                $validated = $request->validate([
                    'email' => 'required',
                ]);

            } else {
                $validated = $request->validate([
                    'email' => 'required|email|unique:patients',
                ]);

            }
        }

        $data = Patient::where('id', $request->id)->update([

            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'confirm_password' => $request->input('confirm_password'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),

            'status' => $request->input('status'),

            'email_verified_token' => str::random(32),
            'email_verified' => 1,
            // 'patients_id' => $patients_id,

        ]);

        if ($data) {
            $notification = array(
                'message' => 'Successfully data Update',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function DeletePatientData($id)
    {

        $data=DB::table('patients')->where('id',$id)->delete();
        if ($data) {
            $notification = array(
                'message' => 'Successfully data Deleted',
                'alert-type' => 'success',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error',
            );
            return Redirect()->route('all.patient.page')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
