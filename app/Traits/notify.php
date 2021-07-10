<?php

namespace App\Traits;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait notify
{

    public function DocInsert(Request $request)
    {

        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:doctors',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'datepicker' => 'required',
            'gender' => 'required',


        ]);
        $dt=Department::where('department',$request->department)->first();
        $dpt_id=$dt->id;

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $data['confirm_password'] = Hash::make($request->confirm_password);
        $data['datepicker'] = $request->datepicker;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $data['city'] = $request->city;
        $data['department'] = $request->department;
        $data['dpt_id'] = $dpt_id;
        $data['specialist'] = $request->specialist;
        $data['phone'] = $request->phone;
        // $image=$data['profile_photo']=$request->profile_photo;

        $data['biography'] = $request->biography;
        $data['status'] = $request->status;
        // $doctors_id=Helper::IdGenerator(new doctors,'doctors_id', 5, 'DR');
        // $data['doctors_id']=$doctors_id;

        //  $admin=DashBoard::find(1);

        //  $admin->notify(new notifyDoctor($data));

        $image = $request->file('profile_photo');
        if ($image == null) {
            if ($data['gender'] == 'male') {

                $data['profile_photo'] = 'boy.png';

            } else {
                $data['profile_photo'] = 'girl.png';
            }
        }
        if ($image) {
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'dashboard/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['profile_photo'] = $image_url;
                $employee = DB::table('doctors')
                    ->insert($data);

                if ($employee) {

                    $notification = array(
                        'message' => 'Successfully  inserted',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);

                } else {

                    $notification = array(
                        'message' => 'Error',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                }
            } else {
                return Redirect()->back();
            }
        } else {
            if ($data) {

                $employee = DB::table('doctors')
                    ->insert($data);

                if ($employee) {
                    $notification = array(
                        'message' => 'Successfully  inserted',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);

                } else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                }

            }
        }
    }

    public function DocUpdate(Request $request, $id)
    {

        $data = array();
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['datepicker'] = $request->datepicker;
        $data['gender'] = $request->gender;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $data['city'] = $request->city;
        $data['department'] = $request->department;
        $data['specialist'] = $request->specialist;
        $data['phone'] = $request->phone;
        // $image=$data['profile_photo']=$request->profile_photo;

        $data['biography'] = $request->biography;
        $data['status'] = $request->status;
        $image = $request->file('profile_photo');

        if ($image) {
            $image_name = str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'dashboard/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['profile_photo'] = $image_url;
                $prd = DB::table('doctors')->where('id', $id)->first();
                $img = $prd->profile_photo;
                if ($img) {

                    if ($img == 'girl.png') {
                        $allData = DB::table('doctors')->where('id', $id)->update($data);
                    } elseif ($img == 'boy.png') {
                        $allData = DB::table('doctors')->where('id', $id)->update($data);
                    } else {
                        $done = unlink($img);
                        $allData = DB::table('doctors')->where('id', $id)->update($data);
                    }

                    if ($allData) {
                        $notification = array(
                            'message' => 'Successfully data Updated',
                            'alert-type' => 'success',
                        );
                        return Redirect()->route('all.doc.list')->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Nothing have changed',
                            'alert-type' => 'success',
                        );
                        return Redirect()->route('all.doc.list')->with($notification);
                    }
                } else {

                    $allData = DB::table('doctors')->where('id', $id)->update($data);

                    if ($allData) {
                        $notification = array(
                            'message' => 'Successfully data Updated',
                            'alert-type' => 'success',
                        );
                        return Redirect()->route('all.doc.list')->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Nothing have changed',
                            'alert-type' => 'success',
                        );
                        return Redirect()->route('all.doc.list')->with($notification);
                    }
                }
            } else {
                return Redirect()->back();
            }
        } else {

            $oldphoto = $request->old_photo;
            // dd($oldphoto);
            if ($oldphoto) {

                $data['profile_photo'] = $oldphoto;
                $user = DB::table('doctors')->where('id', $id)->update($data);
                if ($user) {
                    $notification = array(
                        'message' => 'Successfully data Updated',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Nothing have changed',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                }

            } else {
                $user = DB::table('doctors')->where('id', $id)->update($data);
                if ($user) {
                    $notification = array(
                        'message' => 'Successfully data Updated',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Nothing have changed',
                        'alert-type' => 'success',
                    );
                    return Redirect()->route('all.doc.list')->with($notification);
                }
            }

        }
    }

    public function DocDelete($id)
    {

        $prd = DB::table('doctors')->where('id', $id)->first();
        $img = $prd->profile_photo;
        if ($img) {
            if ($img == 'girl.png') {
                $dt = DB::table('doctors')->where('id', $id)->delete();
            } elseif ($img == 'boy.png') {
                $dt = DB::table('doctors')->where('id', $id)->delete();
            } else {
                $done = unlink($img);
                $dt = DB::table('doctors')->where('id', $id)->delete();
            }

            if ($dt) {
                $notification = array(
                    'message' => 'Successfully data Deleted',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.doc.list')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.doc.list')->with($notification);
            }
        } else {
            $dt = DB::table('doctors')->where('id', $id)->delete();

            if ($dt) {
                $notification = array(
                    'message' => 'Successfully data Deleted',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.doc.list')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Nothing have changed',
                    'alert-type' => 'success',
                );
                return Redirect()->route('all.doc.list')->with($notification);
            }
        }

    }




}
