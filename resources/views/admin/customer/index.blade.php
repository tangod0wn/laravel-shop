@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	             @include('admin.customer.shared.panel-heading')	
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-12">
                			<div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Cusomer Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         @foreach($customers as $customer)
                         	
                            <tr>
                                <td>                                    
                                    <a href="#">{{ $customer->id }}</a>
                                </td>
                                <td>
                                    {{ $customer->fullname() }}
                                </td>
                                <td>
                                	Hold No #{{ $customer->hold_no }}, {{ $customer->hold_name }} <br>
                                    Road #{{ $customer->road_no }}, Area :{{ $customer->hold_area }}
                                </td>
                                <td>
                                     {{ $customer->email }}
                                </td>
                                <td>{{ $customer->phone_number }}</td>

                                <td>
                                    <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Full View"><span class="glyphicon glyphicon-search"></span></a>
                                    <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            
                         @endforeach
                        </tbody>
                    </table>
				    <div class="clearfix"></div>
				    <div class="pull-right">
				        {{ $customers->render() }}
				    </div>                    
                			</div>		                		
	                	</div>       	
	                
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection