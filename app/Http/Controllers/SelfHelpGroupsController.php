<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SelfHelpGroup;

use App\Village;

use App\SHGCoordinator;


class SelfHelpGroupsController extends Controller
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
        $shgs = SelfHelpGroup::all();

        return view('self_help_groups.index',compact('shgs'));
        
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
        $shg_coordinators = SHGCoordinator::all();
        return view('self_help_groups.create',compact('villages','shg_coordinators'));

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
        $this->validate($request, [
        'name' => 'required',        
        ]);
     

        $shg = new SelfHelpGroup($request->all());
        $village = Village::findorfail($request->village_id);
        $shg->shg_coordinator_id = $village->shg_coordinator_id;
        $shg->economic_status = $request->economic_status;
        $shg->save();

        return redirect(url('self-help-groups'));
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

        $villages = Village::all();
        $shg = SelfHelpGroup::findorfail($id);
        return view('self_help_groups.edit',compact('shg','villages'));
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
        $shg = SelfHelpGroup::findorfail($id);
        $village = Village::findorfail($request->village_id);
        $shg->shg_coordinator_id = $village->shg_coordinator_id;
       
        $shg->update($request->all());

        return redirect(url('self-help-groups'));

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
