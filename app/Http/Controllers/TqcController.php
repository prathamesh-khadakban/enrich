<?php

namespace App\Http\Controllers;

use App\Tqc;
use Illuminate\Http\Request;
use DataTables;
use Redirect,Response;

class TqcController extends Controller
{

/**
* Create a new controller instance.
*
* @return void
*/
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
$data = Tqc::latest()->get();
return Datatables::of($data)
->addIndexColumn()
->addColumn('action', function($row){

/*$action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id='.$row->id.'>Show</a>
<a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
<meta name="csrf-token" content="{{ csrf_token() }}">
<a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user">Delete</a>';*/

$action = '
<a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
<meta name="csrf-token" content="{{ csrf_token() }}">
';


return $action;

})
->rawColumns(['action'])
->make(true);
}

return view('tqcs');
}

public function store(Request $request)
{

	$r=$request->validate([
		/*'name' => 'required',
		'email' => 'required',*/

	]);

	$uId = $request->user_id;
	Tqc::updateOrCreate(
                ['id' => $uId],
                [/*'name' => $request->name,
                 'email' => $request->email,*/
                 'file_name' => $request->file_name,
                 'container' => $request->container,
                 'video_codec' => $request->video_codec,
                 'video_aspect_ratio' => $request->video_aspect_ratio,
                 'video_frame_size' => $request->video_frame_size,
                 'video_frame_rate' => $request->video_frame_rate,
                 'video_bitrate' => $request->video_bitrate,
                 'h_264_profile' => $request->h_264_profile,
                 'audio_sampling_rate' => $request->audio_sampling_rate,
                 'audio_bitrate' => $request->audio_bitrate,
                 'audio_codec' => $request->audio_codec,
                 'audio_channels' => $request->audio_channels,
                 'key_frame_interval' => $request->key_frame_interval,
                 'duration' => $request->duration,
                 'status' => $request->status
                ]);
	if(empty($request->user_id))
		$msg = 'User created successfully.';
	else
		$msg = 'User data is updated successfully';
	return redirect()->route('tqcs.index')->with('success',$msg);

	/*$Qc = new Tqc;

        $Qc->file_name = $request->file_name;
        $Qc->container = $request->container;
        $Qc->video_codec = $request->video_codec;
        $Qc->video_aspect_ratio = $request->video_aspect_ratio;
        $Qc->video_frame_size = $request->video_frame_size;
        $Qc->video_frame_rate = $request->video_frame_rate;
        $Qc->video_bitrate = $request->video_bitrate;
        $Qc->h_264_profile = $request->h_264_profile;
        $Qc->audio_sampling_rate = $request->audio_sampling_rate;
        $Qc->audio_bitrate = $request->audio_bitrate;
        $Qc->audio_codec = $request->audio_codec;
        $Qc->audio_channels = $request->audio_channels;
        $Qc->key_frame_interval = $request->key_frame_interval;
        $Qc->duration = $request->duration;

        $Qc->save();

        return redirect()->back()->with('message', 'Form Submitted Successfully');*/
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function show($id)
{
$where = array('id' => $id);
$user = Tqc::where($where)->first();
return Response::json($user);
//return view('users.show',compact('user'));
}

/**
* Show the form for editing the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function edit($id)
{
$where = array('id' => $id);
$user = Tqc::where($where)->first();
return Response::json($user);
}

/**
* Remove the specified resource from storage.
*
* @param int $id
* @return \Illuminate\Http\Response
*/

public function destroy($id)
{
$user = Tqc::where('id',$id)->delete();
return Response::json($user);
//return redirect()->route('users.index');
}
}