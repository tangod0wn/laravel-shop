@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
	             @include('admin.category.shared.panel-heading')   
	            </div>
	            <div class="panel-body">
	                <div class="row">
						<div class="col-md-4">
						    <div class="panel panel-default create-box">
						        <div class="panel-heading">Delete Category: {{ $category->name }}</div>
						        <div class="panel-body">
						        @include('admin.category.shared.flash-message')
						        @if($category->products()->count() ==  0)						        
						            <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
						                {!! csrf_field() !!}
						                <div class="form-group">
						                    <div class="panel panel-default">
						                    	<div class="panel-heading">
						                    		Sure to delete this item?
						                    	</div>
						                    	<div class="panel-body">
						                    		<div class="panel-message">This category is not associated with any products. You can delete this.</div>	
									                <div class="pull-right">
									                    <button type="submit" class="btn btn-primary btn-sm">Delete
									                    </button>
									                </div>						                    		
						                    	</div>
						                    </div>
			                                       
						                </div>
	                                    
						            </form>
						         @else
						                <div class="form-group">
						                    <div class="panel panel-default">
						                    	<div class="panel-heading">
						                    		Sure to delete this item?
						                    	</div>
						                    	<div class="panel-body">
						                    		<div class="panel-message">This category is  associated with  
						                    		{{ $category->products()->count() }} {{ str_plural('product', $category->products()->count()) }}. You can not delete this.</div>	
									                <div class="pull-right">
									                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" type="submit" class="btn btn-primary btn-sm">Back
									                    </a>
									                </div>						                    		
						                    	</div>
						                    </div>
			                                       
						                </div>
						         @endif   
						        </div>
						    </div>
						</div>
						<div class="col-md-8">
						    <div class="table-responsive">
						        @include('admin.category.shared.category-table')		
						    </div>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection