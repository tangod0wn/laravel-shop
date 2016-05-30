@extends('layouts.admin.app')

@section('content')

<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10 admin-content">
	        <!-- @include('admin.product.shared.nav') -->	    	    
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	            @include('admin.product.shared.panel-heading')		
	            </div>
	            <div class="panel-body">
	            	<div class="row">
	            		@include('admin.product.shared.flash-message')
	            		<div class="col-md-12">
	        				@include('admin.product.shared.product-table')            			
	            		</div>
	            	</div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection