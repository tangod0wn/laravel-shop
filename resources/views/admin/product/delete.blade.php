@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	    	@include('admin.product.shared.nav')	    	    
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	             @include('admin.product.shared.panel-heading')  
	            </div>
	            <div class="panel-body">
	                <div class="row">
	                	<div class="col-md-7 ">
						    <div class="panel panel-default create-box">
						        <div class="panel-heading">Delete Product: {{ $product->name }}</div>
						        <div class="panel-body">
						        @if(Session::has('warning'))
						            <div class="flash-message flash-message-warning">
						                {{ Session::get('warning') }}
						            </div>
						        @endif						        
						            <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST">
						                {!! csrf_field() !!}
						                <div class="form-group">
						                    <div class="panel panel-default create-box">
						                    	<div class="panel-heading">
						                    		Are you sure to delete this item?
						                    	</div>
						                    	<div class="panel-body">
									                <div class="pull-right">
									                    <button type="submit" class="btn btn-primary btn-sm">Delete
									                    </button>
									                </div>						                    		
						                    	</div>
						                    </div>
			                                       
						                </div>
	                                    
						            </form>
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