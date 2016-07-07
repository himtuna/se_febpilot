@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Villages</div>

                <div class="panel-body">
                <a href="{{url('self-help-groups/create')}}" class="btn btn-primary pull-right">+ Self Help Group</a>
                <div class="clear-fix"></div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>SHG Name</th>
                            <th>Village</th>                            
                            <th>Economic Status</th>
                            <th>Caste Status</th>
                            <th>SHG Details</th>                            
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach($shgs as $shg)
                            <tr>
                                <td><strong>{{$shg->name}}</strong> <br> <small>Established On: {{$shg->established_on}}</small>
                                </td>
                                <td> <a href="{{url('villages')}}">{{$shg->village->name}}</a><br>
                                <small>SHG Coord.: <a href="{{url('shg-coordinators#'.$shg->shg_coordinator->id)}}">
                                {{$shg->shg_coordinator->name}}</a></small></td>                                
                                <td>
                                SHG Monthly Deposit: Rs. {{$shg->monthly_deposit}} <br>
                                {{$shg->economic_status}}<br>{{$shg->economic_status_detail}}</td>
                                <td>{{$shg->caste_status}}<br>{{$shg->caste_status_detail}}</td>
                                <td>
                                    DBP Scheme: {{($shg->dbp_scheme == 1) ? 'Yes': 'No' }} <br>
                                    Soap Making Scheme: {{($shg->soap_making_scheme == 1) ? 'Yes': 'No' }} <br>
                                    PPES Students: {{($shg->ppes_students == 1) ? 'Yes': 'No' }} <br>
                                    Govt Scheme: {{$shg->govt_scheme}}
                                </td>                                
                                <td><a href="{{url('self-help-groups/'.$shg->id.'/edit')}}"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
