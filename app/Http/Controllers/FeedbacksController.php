<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Member;

use App\Village;

use App\VideoStack;

use App\Video;

use App\Feedback;

class FeedbacksController extends Controller
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
    public function index()
    {
        //
        $feedbacks = Feedback::all();
        $villages = Village::all();
        $videostacks = VideoStack::all();

        return view('feedbacks.index',compact('feedbacks','villages','videostacks'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $videostacks = VideoStack::all();
        $members = Member::all();

        return view('feedbacks.create',compact('members','videostacks'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $feedback = new Feedback($request->all());
        $feedback->save();

        return redirect(url('feedbacks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $feedback = Feedback::findorfail($id);
        $videos = Video::all();
        $members = Member::all();

        return view('feedbacks.edit',compact('feedback','videos','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $feedback = Feedback::findorfail($id);
        $feedback->update($request->all());
        
        return redirect(url('feedbacks'));
    }

    public function ajax_videos(Request $request)
    {        
        $video_stack_id = $request->video_stack_id;

        $videos =  Video::where('video_stack_id','=',$video_stack_id)->get();

        return \Response::json($videos);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
