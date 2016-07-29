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
        
        $villages = Village::with('members')->get();
        
        return view('members.index',compact('villages'));

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
        $education_types = Member::$education_types;
        $marital_types = Member::$marital_types;
        return view('members.create',compact('villages',"education_types","marital_types"));
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

        if($request->can_write == 1) {
            $member->can_write = 1;
        }
        else $member->can_write = 0;

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

        $education_types = Member::$education_types;
        $marital_types = Member::$marital_types;
        return view('members.edit',compact('member','villages',"education_types","marital_types"));
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

        if($request->bank_account == 1) {
            $member->bank_account = 1;
        }
        else $member->bank_account = 0;

        if($request->samhu_saheli == 1) {
            $member->samhu_saheli = 1;
        }
        else $member->samhu_saheli = 0;

        if($request->can_write == 1) {
            $member->can_write = 1;
        }
        else $member->can_write = 0;


        if($request->feature_phone == 1) {
            $member->feature_phone = 1;            
        }
        else $member->feature_phone = 0;

        if($request->feature_phone_usage_noncalling == 1) {
            $member->feature_phone_usage_noncalling = 1;
        }
        else $member->feature_phone_usage_noncalling = 0;

        if($request->feature_phone_assistance == 1) {
            $member->feature_phone_assistance = 1;
        }
        else $member->feature_phone_assistance = 0;

        if($request->feature_phone_own == 1) {
            $member->feature_phone_own = 1;
        }
        else $member->feature_phone_own = 0;


        if($request->smartphone_home == 1) {
            $member->smartphone_home = 1;
        }
        else $member->smartphone_home = 0;

        if($request->television == 1) {
            $member->television = 1;
        }
        else $member->television = 0;


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
