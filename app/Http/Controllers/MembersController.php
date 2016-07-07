<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Member;

use App\Village;



class MembersController extends Controller
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
        $villages = Village::all();
        $members = Member::all();

        return view('members.index',compact('villages','members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $villages = Village::all();
        return view('members.create',compact('villages'));
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
        $member = new Member($request->all());
        $member->save();   

        $filepath = 'uploads/members/'. $member->village->name .'/';
        $filename = $member->name . '.jpg';
        $image = $filepath . $filename;
        $member->image = $image;

        $member->update();   
      
        return redirect(url('members/'.$member->id));      
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
        $member = Member::findorfail($id);
        return view('members.show',compact('member'));

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
        $villages = Village::all();
        $member = Member::findorfail($id);
        return view('members.edit',compact('member','villages'));
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

        $member = Member::findorfail($id);

        $member->update($request->all()); 

        if($request->feedback == "<p></p>") {
            $member->feedback = NULL;
            $member->update(); 
        }

        if ($request->file('photo')) {
            //

            $filepath = 'uploads/members/'. $member->village->name .'/';
            $filename = $member->name . '.jpg';
            $image = $filepath . $filename;
            
            $request->file('photo')->move($filepath, $filename);
            

            $user->image = $image;
            $user->update();
        }    

        return redirect(url('members/'.$member->id));
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
