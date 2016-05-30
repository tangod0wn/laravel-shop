@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	             @include('admin.order.shared.panel-heading')	
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-12">
                			<div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Order No</th>
                            <th>Cusomer Name</th>
                            <th>Total Products</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                         @foreach($orders as $order)
                         	
                            <tr>
                                <td>                                    
                                    <a href="{{ route('order.show', ['id' => $order->id]) }}">{{$order->id}}</a>
                                </td>
                                <td>
                                    {{ $order->order_no }}
                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                	{{ count($order->orderItems) }}
                                </td>
                                <td>
                                     {{$order->total }} Tk
                                </td>
                                <td>{{ $order->created_at}}</td>
                                <td>{{  str_limit($order->message, 15) }}</td>
                                <td>
                                   
                                </td>
                                <td>
                                    <a href="{{ route('order.show', ['id' => $order->id]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Full View"><span class="glyphicon glyphicon-search"></span></a>
                                    <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            
                         @endforeach
                        </tbody>
                    </table>
				    <div class="clearfix"></div>
				    <div class="pull-right">
				        {{ $orders->render() }}
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