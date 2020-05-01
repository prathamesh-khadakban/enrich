<?php

namespace App\Http\Controllers;

use App\Qc;
use Illuminate\Http\Request;

class QcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        print_r("hi");
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
        $Qc = new Qc;

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

        return redirect()->back()->with('message', 'Form Submitted Successfully');;

        //print_r($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function show(Qc $qc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function edit(Qc $qc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qc $qc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qc  $qc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qc $qc)
    {
        //
    }
}
