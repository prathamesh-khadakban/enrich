<?php

namespace App\Http\Controllers;

use App\Acquistion;
use Illuminate\Http\Request;
use DataTables;
use Redirect,Response;
use Illuminate\Support\Facades\Storage;


class AcquistionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Acquistion::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){

        $action = '
        <button type="button" class="btn btn-info" id="edit-user" data-toggle="modal" data-id='.$row->id.' >Edit</button>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        ';


        return $action;

        })
        ->addColumn('action2', function($row){

        if ($row->acquistions_status == 1) {
                
        $action2 = '<span class="badge badge-success">Active</span>';

        }else{
              $action2 =  '<span class="badge badge-danger">Inactive</span>'; 
        }

        return $action2;

        })
        ->rawColumns(['action2'],['action'])
        ->make(true);
        }

        return view('acquistion/acquistions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $r=$request->validate([

                'Research_Background' => 'required',
                'Coach_Name' => 'required',
                'Coach_Contact_Details' => 'required',
                'Area_of_expertise' => 'required',
                'Current_Content_request_details' => 'required',
                'Status' => 'required',
                'Status_Reason' => 'required',
                'Content_ownership_period' => 'required',
                'Details_of_content_files_received' => 'required',
        ]);

        if ($request->hasFile('Agreement')) {  
            $filename = $request->file('Agreement')->getClientOriginalName();
            $path = $request->file('Agreement')->storeAs('public',$filename);        
        }else{
            $filename = $request->Agreement_filename;
        }

        //return $request->all();
        if ($request->hasFile('Agreement') && $request->Agreement_filename) {
            Storage::disk('public')->delete($request->Agreement_filename);
        }


        $uId = $request->user_id;
        Acquistion::updateOrCreate(
                    ['id' => $uId],
                    ['research_background' => $request->Research_Background,
                     'coach_name' => $request->Coach_Name,
                     'coach_contact_details' => $request->Coach_Contact_Details,
                     'area_of_expertise' => $request->Area_of_expertise,
                     'current_content_request_details' => $request->Current_Content_request_details,
                     'status' => $request->Status,
                     'status_reason' => $request->Status_Reason,
                     'content_ownership_period' => $request->Content_ownership_period,
                     'details_of_content_files_received' => $request->Details_of_content_files_received,
                     'time_bound_starting_date' => $request->Time_Bound_Starting_Date,
                     'time_bound_ending_date' => $request->Time_Bound_Ending_Date,
                     'agreement' => $filename,
                     
                    ]);
        if(empty($request->user_id))
            $msg = 'User created successfully.';
        else
            $msg = 'User data is updated successfully';
        return redirect()->route('acquistions.index')->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acquistion  $acquistion
     * @return \Illuminate\Http\Response
     */
    public function show(Acquistion $acquistion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acquistion  $acquistion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $user = Acquistion::where($where)->first();
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acquistion  $acquistion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acquistion $acquistion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acquistion  $acquistion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acquistion $acquistion)
    {
        //
    }
}
