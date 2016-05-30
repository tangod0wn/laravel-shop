@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
<nav>
    <div class="navbar-header">
        <span class="navbar-brand">Message No: {{ $message->id  }}</span>
    </div>
    <div class="container-fluid">
   

    </div>
</nav>	            
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-7">
                      <div class="panel panel-default">
                        <div class="panel-heading">Message</div>
                        <div class="panel-body">
                          {{ $message->body }}
                        </div>
                      </div>		                		
	                	</div>

  <div class="col-md-4" >
    <div class="panel panel-default shipping-panel">
    <div class="panel-heading">Sender</div>
    <div class="panel-body shipping_address">
      <address>
      <span class="name">{{ $message->name }}</span><br>
      <span class="email"> {{ $message->email }}</span><br>
      <span class="cell"> {{ $message->phone_number }}</span><br>
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