@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Self Help Groups</div>

                <div class="panel-body">
                <a href="{{url('self-help-groups/create')}}" class="btn btn-primary pull-right">+ Self Help Group</a>
                <div class="clear-fix"></div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>SHG Name</th>
                            <th>SHG Details</th>
                            <th>Socio-Economic Status</th>
                            <th>Member Details</th>                                                        
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach($shgs as $shg)

                            <tr id="{{$shg->id}}">
                            
                                <td>
                                    <strong>{{$shg->name}}</strong> <br> 
                                    <a href="{{url('villages#'.$shg->village->id)}}">{{$shg->village->name}} Village</a> <br>
                                    <small>SHG Age: {{$shg->shg_age}}<br>
                                    Phones issued: {{$shg->phones_count}} <br>
                                    Total Active Members: {{count($shg->village->members)}}</small> 
                                </td>
                                <td>
                                    <small> 
                                    SHG Coord.: <a href="{{url('shg-coordinators#'.$shg->shg_coordinator->id)}}">{{$shg->shg_coordinator->name}}</a><br>
                                    Samhu Saheli: <a href="{{url('members/'.$shg->samhu_saheli['id'])}}">{{$shg->samhu_saheli['name']}}</a><br>
                                    Is Samshu Saheli member: {{($shg->samhu_saheli_member == 1) ? 'Yes': 'No' }}<br>
                                    
                                    SHG Monthly Deposit: Rs. {{$shg->monthly_deposit}} <br>
                                    Bank Account: {{($shg->bank_account == 1) ? 'Yes': 'No' }} <br>
                                    SHG Savings: Rs. {{$shg->savings}}
                                    </small> 
                                </td>                                
                                <td>
                                   <small>Economic: <span class="label {{($shg->economic_status == 'High') ? 'label-success' : ''}} {{($shg->economic_status == 'Medium') ? 'label-info' : ''}} {{($shg->economic_status == 'Low') ? 'label-warning' : ''}}">{{$shg->economic_status}}</span><br>{{$shg->economic_status_detail}}<br>
                                    Caste: <span class="label {{($shg->caste_status == 'High') ? 'label-success' : ''}} {{($shg->caste_status == 'Medium') ? 'label-info' : ''}} {{($shg->caste_status == 'Low') ? 'label-warning' : ''}}">{{$shg->caste_status}}</span><br>{{$shg->caste_status_detail}}</small>
                                </td>
                                <td>
                                    <small>
                                    Literacy Level: {{$shg->literacy_level}} <br>
                                    Average Age: {{$shg->women_age_avg}}<br>
                                    Family Profession: {{$shg->family_profession}}<br>
                                    Marital Status: {{$shg->women_marital_count}}<br>                                  
                                    </small>                                    
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
