<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllSpecialistPage()
    {
        if (request()->ajax()) {
            // $data = Practice::orderBy('id', 'desc')->limit(100)->get();

            return datatables()->of(Specialist::latest()->get())
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '"class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '"class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->setRowClass(function ($data) {
                    return $data->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('specialist.allspecialist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InsertSpecialistPage(Request $request)
    {
        $rules = array(
            'specialist' => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = array();
        $dp = $data['specialist'] = $request->specialist;

        $employee = DB::table('specialists')
            ->insert($data);
        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EditSpecialistPage($id)
    {
        $data = DB::table('specialists')->where('id', $id)->first();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function UpdateSpecialistPage(Request $request)
    {
        $rules = array(
            'specialist' => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $data = array();
        $data['specialist'] = $request->specialist;

        $dt = DB::table('specialists')->where('id', $request->hidden_id)->update($data);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function DeleteSpecialistPage($id)
    {
        $data = DB::table('specialists')->where('id', $id)->delete();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialist $specialist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialist  $specialist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        //
    }
}
