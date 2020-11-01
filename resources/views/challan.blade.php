@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Challan</div>

                <div class="card-body">
                    
                    <a data-toggle="modal" href="#" data-target="#approve_modal" id="create_challan">Create Challan</a>

                    <a data-toggle="modal" href="#" data-target="#approve_modal2" id="generate_challan">Generate Challan</a>

                    <br/>
                    <div class = "row">
            <div class = "col-md-12">
                 <div class="datatable-add-row table-responsive">
                                <table class="table table-bordered" id="challan-table">
                                
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Fees</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="challan-body">
                    @if(!empty($challans))
                        @foreach($challans as $key=>$challan)
                                        <tr>
                                            
                                            <td>{{$challan->name}}</td>
                                            
                                            <td>{{$challan->fee}}</td>
                            
                            <td>
                                
                                <a data-toggle="modal" href="#" data-target="#approve_modal1" id="{{$challan->id}}" class="btn event_btn add_concession">Add Concession</a>

                                <!--<a href="#" class="btn event_btn">Delete</a>
                                <a data-toggle="modal" role="button" data-target="#approve_modal" id="{{$challan->id}}" class="btn event_btn remove_btn_color">Edit</a>-->
                                            </td>
                                        </tr>
                        @endforeach
                    @endif

                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of one container -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Concession</div>

                <div class="card-body">
                    
                    <div class = "row">
            <div class = "col-md-12">
                 <div class="datatable-add-row table-responsive">
                                <table class="table table-bordered" id="concession-table">
                                
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Fees</th>
                                            <th>Priority</th>
                                            <th>Concession %</th>
                                            <th>Fee After Concession</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="concession-body">
                    @if(!empty($concessions))
                        @foreach($concessions as $key=>$concession)
                                        <tr id="row-{{$concession->id}}">
                                            <th>{{$concession->id}}</th>
                                            <td>{{$concession->concession_challan->name}}</td>
                                            
                                            <td>{{$concession->concession_challan->fee}}</td>
                                            <td>{{$concession->priority}}</td>
                                            <td>{{$concession->concession}}</td>
    <td>{{($concession->concession_challan->fee - ($concession->concession / 100) * $concession->concession_challan->fee)}}</td>
                            
                            <td>
                                
                                <a href="#" id="{{$concession->id}}" class="btn event_btn delete_concession">Delete</a>
                                
                                            </td>
                                        </tr>
                        @endforeach
                    @endif

                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of 2nd container -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Concession</div>

                <div class="card-body">
                    
                    <div class = "row">
            <div class = "col-md-12">
                 <div class="datatable-add-row table-responsive">
                                <table class="table table-bordered" id="gchallan-table">
                                
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="concession-body">
                    @if(!empty($gChallans))
                        @foreach($gChallans as $key=>$g)
                                        <tr id="gRow-{{$g->id}}">
                                            <th>Challan-{{$g->id}}</th>
                                            
                                        </tr>
                        @endforeach

                        @else

                        <tr id="">
                                            <th>-</th>
                                            
                                        </tr>
                    @endif

                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of 3rd container -->

<!-- Modal for approve with remote path -->
<div id="approve_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-accessibility"></i></h4>
            </div>


     <form class="form-horizontal" method="POST" action="{{route('create_challan')}}" role="form" enctype="multipart/form-data" id="challan-form" novalidate="novalidate">
            {{ csrf_field() }}
       
                <input type="hidden" id="tType" name="tType" value="challan" />

                <div class="form-group">
                <label class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
                    
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-3 control-label">Fee*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="fee" name="fee" placeholder="Enter Fee" >
                    
                </div>
                </div>

                <div class="col-sm-12">
                    <input type="submit" value="Save" class="btn btn-primary" id="challan-submit">

                    <input type="submit" value="Cancel" class="btn btn-danger" data-dismiss="modal">
                    
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /modal for approve with remote path -->

<!-- Modal for approve with remote path -->
<div id="approve_modal1" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-accessibility"></i></h4>
            </div>


     <form class="form-horizontal" method="POST" action="{{route('create_challan')}}" role="form" enctype="multipart/form-data" id="concession-form" novalidate="novalidate">
            {{ csrf_field() }}
       
                <input type="hidden" id="tType" name="tType" value="concession" />

                <input type="hidden" id="challan_id" name="challan_id" value="0" />

                <!--<div class="form-group">
                <label class="col-sm-3 control-label">Challan*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
                    
                </div>
                </div>-->

                <div class="form-group">
                <label class="col-sm-3 control-label">Priority*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="priority" name="priority" placeholder="Enter Name" >
                    
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-3 control-label">Concession*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="concession" name="concession" placeholder="Enter Fee" >
                    
                </div>
                </div>

                <div class="col-sm-12">
                    <input type="submit" value="Save" class="btn btn-primary" id="concession-submit">

                    <input type="submit" value="Cancel" class="btn btn-danger" data-dismiss="modal">
                    
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /modal for approve with remote path -->

<!-- Modal for approve with remote path -->
<div id="approve_modal2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-accessibility"></i></h4>
            </div>


        <!--table show -->

        <div class = "row">
            <div class = "col-md-12">
                 <div class="datatable-add-row table-responsive">
                                <table class="table table-bordered" id="generate_challan-table">
                                
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody id="gChallan-body">

                                    </tbody>
                                </table>
                            </div>
            </div>
        </div>

        <!--table show -->

        </div>
    </div>
</div>
<!-- /modal for approve with remote path -->

@endsection
