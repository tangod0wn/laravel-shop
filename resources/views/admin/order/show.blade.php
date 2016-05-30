@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
<nav>
    <div class="navbar-header">
        <span class="navbar-brand">Order No: {{ $order->order_no }}</span>
    </div>
    <div class="container-fluid">
   

    </div>
</nav>	            
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-7">
                			<div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th> Product name </th>
                  <th> Amount </th>
                  <th> Price </th>
                  <th> Total </th>
                </tr>
              </thead>
              <tbody> @foreach($order->orderItems as $orderitem)
                <tr>
                  <td>{{$orderitem->name}}</td>
                  <td>{{$orderitem->pivot->amount}} {{ $orderitem->unit }}</td>
                  <td>{{$orderitem->price}}</td>
                  <td>{{$orderitem->pivot->total}}</td>
                </tr> @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                  <td><b>{{$order->total}}</b></td>
                </tr>
                <tr>

              </tbody>
            </table> 
            @if($order->message)
            <div class="panel panel-default">
              <div class="panel-heading">Message</div>
              <div class="panel-body">
                {{ $order->message  }}
              </div>
            </div>
            @endif                   
                			</div>		                		
	                	</div>

  <div class="col-md-4" >
    <div class="panel panel-default shipping-panel">
    <div class="panel-heading">Shipping To</div>
    <div class="panel-body shipping_address">
              <address>
            <span class="name">{{ $order->User->fullname() }}</span><br>
            <span class="email"> {{ $order->User->email }}</span><br>
            <span class="cell"> {{ $order->User->phone_number }}</span><br>
            <span class="address_heading">Address</span><br>
            <span class="hold_name">Hold Name: {{ $order->User->hold_name }} </span><br>
            <span class="hold_no"> Hold No: {{ $order->User->hold_no }}, Road no: {{ $order->User->road_no }} </span><br>
            <span class="hold_area"> Area: {{ $order->User->hold_area }}</span><br>
            <span class="address">Address: {{ $order->User->address }} </span><br>
            @if($order->address)
            <span class="address"><b>New Address</b>: {{ $order->address }} </span><br>
            @endif
            </address>



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