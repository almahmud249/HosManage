<?php

namespace App\Http\Controllers\AdminDash;

use App\Traits\notify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DocController extends Controller
{
    use notify;

    public function showSignUpForm()
    {
        return view('doctor.singupForm');
    }


    public function AllDocList(){
        $dt=DB::table('doctors')->get();

        return view('doctor.allDoctor',compact('dt'));
    }



    public function DocEdit($id){
        $dt=DB::table('doctors')->where('id',$id)->first();

        return view('doctor.editDoc',compact('dt'));

    }

}
