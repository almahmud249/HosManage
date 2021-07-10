<?php

namespace App\Http\Controllers;

use datatables;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllDeptPage()
    {
        if (request()->ajax()) {
            // $data = Practice::orderBy('id', 'desc')->limit(100)->get();

            return datatables()->of(Department::latest()->get())
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
        return view('department.deptpage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InsertDeptPage(Request $request)
    {
        $rules = array(
            'department' => 'required',
            'description' => 'required',
            'status' => 'required',

        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data = array();
        $dp = $data['department'] = $request->department;
        $dp = $data['description'] = $request->description;
        $dp = $data['status'] = $request->status;

        $employee = DB::table('departments')
            ->insert($data);
        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function EditDeptPage($id)
    {
        $data = DB::table('departments')->where('id', $id)->first();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function UpdateDeptPage(Request $request)
    {
        $rules = array(
            'department' => 'required',
            'description' => 'required',
            'status' => 'required',

        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $data = array();
        $data['department'] = $request->department;
        $data['description'] = $request->description;
        $data['status'] = $request->status;

        $dt = DB::table('departments')->where('id', $request->hidden_id)->update($data);
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function DeleteDeptPage($id)
    {

        $data = DB::table('departments')->where('id', $id)->delete();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function GetDept(Request $request)
    {
     return Doctor::where('dpt_id',$request->dpt_id)->select('username')->get();

    }
}
