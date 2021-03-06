@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">        
            <div class="panel panel-default">
                <div class="panel-heading">Villages</div>

                <div class="panel-body">
                <a href="{{url('villages/create')}}" class="btn btn-primary pull-right">+ Village</a>
                <div class="clear-fix"></div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>Village Name</th>
                            <th>Self Help Group</th>                            
                            <th>Economic Status</th>
                            <th>Caste Status</th>
                            <th>Schemes</th>                            
                            <th><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach($villages as $village)
                            <tr id="{{$village->id}}">
                                <td><strong>{{$village->name}}</strong> <br> <small>{{$village->distance}} km from PPES</small>
                                <br><small>Total SHGs: {{$village->total_shgs}}</small> <br>
                                 <!-- more details start -->
                                 <a href="#" type="button" class="" data-toggle="modal" data-target="#village-{{$village->id}}-details"><small>more details <i class="fa fa-link"></i></small></a>

                                    <!-- Modal -->
                                    <div id="village-{{$village->id}}-details" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$village->name}}</h4>
                                          </div>
                                          <div class="modal-body">
                                            <h4>Village Profile</h4>
                                            {{$village->profile}}
                                            <br>
                                            <h4>Education Level</h4>
                                            {{$village->education}}
                                            <h4>Economic Status detail</h4>
                                            <strong>Ecnonomic status: {{$village->economic_status}}</strong><br>
                                            {{$village->economic_status_detail}}
                                            
                                            <h4>Caste Status detail</h4>
                                            <strong>Ecnonomic status: {{$village->caste_status}}</strong><br>
                                            {{$village->caste_status_detail}}
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                 <!-- more details end -->
                                </td>
                                <td><a href="{{url('self-help-groups#'.$village->self_help_groups[0]->id)}}">{{$village->self_help_groups[0]->name}}</a> <br><small>SHG Coord. <a href="{{url('shg-coordinators#'.$village->shg_coordinator->id)}}">
                                {{$village->shg_coordinator->name}}</a></small></td>                                
                                <td><span class="label {{($village->economic_status == 'High') ? 'label-success' : ''}} {{($village->economic_status == 'Medium') ? 'label-info' : ''}} {{($village->economic_status == 'Low') ? 'label-warning' : ''}}">{{$village->economic_status}}</span></td>
                                <td><span class="label {{($village->caste_status == 'High') ? 'label-success' : ''}} {{($village->caste_status == 'Medium') ? 'label-info' : ''}} {{($village->caste_status == 'Low') ? 'label-warning' : ''}}">{{$village->caste_status}}</span></td>
                                <td>
                                    DBP Scheme: @if($village->dbp_scheme == 1) <span class="label label-success">Yes</span>
                                    @else <span class="label label-warning">No</span> @endif
                                    <br>
                                    Soap Making Scheme: @if($village->soap_making_scheme == 1) <span class="label label-success">Yes</span>
                                    @else <span class="label label-warning">No</span> @endif
                                    <br>
                                    PPES Students: @if($village->ppes_students == 1)  <span class="label label-success">Yes</span>
                                    @else <span class="label label-warning">No</span> @endif<br>
                                    Govt Scheme: {{$village->govt_scheme}}
                                </td>                                
                                <td><a href="{{url('villages/'.$village->id.'/edit')}}"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
