@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Challan</div>

                <div class="card-body">
                    
                    <a data-toggle="modal" href="#" data-target="#approve_modal" id="create_challan">Crete Challan</a>
                    <br/>
                    <div class = "row">
            <div class = "col-md-12">
                 <div class="datatable-add-row table-responsive">
                                <table class="table table-bordered" id="concession-table">
                                
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Fee</th>
                                            <th>Priority</th>
                                            <th>Consession %</th>
                                            <th>Fee After Consession</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="challan-body">
                    @if(!empty($challans))
                        @foreach($challans as $key=>$challan)
                                        <tr>
                                            <td>{{$challan->id}}</td>
                                            <td>{{$challan->name}}</td>
                                            
                            <td>{{$challan->fee}}</td>
                            <td>{{$challan->priority}}</td>
                            <td>{{$challan->concession}}</td>
                            <td>{{$challan->concession}}</td>
                            
                            <td>
                                
                                <a href="#" class="btn event_btn">Delete</a>
                                <a data-toggle="modal" role="button" data-target="#approve_modal" id="{{$challan->id}}" class="btn event_btn remove_btn_color">Edit</a>
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

                <div class="form-group">
                <label class="col-sm-3 control-label">Challan*</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" >
                    
                </div>
                </div>

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

@endsection
