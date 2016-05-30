@extends('layouts.admin.app')

@section('content')

<div class="col-md-11">
	<div class="row">
	    <div class="col-md-10">
	    	
	        <div class="panel panel-default admin-content">
	            <div class="panel-heading">
                @include('admin.product.shared.panel-heading')
	            </div>
	            <div class="panel-body">
	            	@include('admin.product.shared.flash-message')
                	<form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                		{!! csrf_field() !!}
	                    <div class="row">
	                        <div class="col-md-5">
				                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				                    <label class="control-label" for="name">Product Name</label>
				                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="e.g. Vegetables">
				                    @if ($errors->has('name'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('name') }}</strong>
				                        </span>
				                    @endif                    
				                </div>

				                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
				                    <label class="control-label" for="price">Price (tk)</label>
				                    <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="e.g. 125.00">
				                    @if ($errors->has('price'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('price') }}</strong>
				                        </span>
				                    @endif                    
				                </div>
				                <div class="row">
				                <div class="form-group{{ $errors->has('variant') ? ' has-error' : '' }} col-md-6">
				                    <label class="control-label" for="variant">Variant</label>
				                    <input type="text" name="variant" value="{{ old('variant') }}" class="form-control" id="variant" placeholder="e.g. 1 kg">
				                    @if ($errors->has('variant'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('variant') }}</strong>
				                        </span>
				                    @endif                    
				                </div>
				                <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }} col-md-6">
				                    <label class="control-label" for="unit">Unit</label>
				                    <input type="text" name="unit" value="{{ old('unit') }}" class="form-control" id="unit" placeholder="e.g. gm/kg/ml">
				                    @if ($errors->has('unit'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('unit') }}</strong>
				                        </span>
				                    @endif                    
				                </div>				                
				                </div>
                                <div class="form-group">
	                                <label>Stock&nbsp;&nbsp;&nbsp;</label>
	                                <br>
	                                <label class="radio-inline">
	                                    <input name="stock" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> In Stock
	                                </label>
	                                <label class="radio-inline">
	                                    <input name="stock" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0" checked> Out Stock
	                                </label>
	                            </div>
	                            <div class="form-group">
	                                <label for="description">Description</label>
	                                <textarea name="description" class="form-control" rows="3"></textarea>
	                            </div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="panel panel-default">
	                                <div class="panel-heading">
	                                    <label>Category</label>
	                                </div>
	                                <div class="panel-body category-box">

	                                @if($categories->count())
	                                	@foreach($categories as $category)
	                                    <div class="checkbox form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	                                    	@if($category->parent_id == 0 )
		                                        <label>
		                                            <input type="checkbox" name="category_id" value="{{ $category->id }}"> 
		                                            {{ $category->name }}
		                                        </label>
	                                        @endif
	                                    </div>
	                                    <div class="subcategory-box">
	                                    	<div class="checkbox form-group">
		                                        @if($category_with_parent_id->count())
		                                        	@foreach($category_with_parent_id as $subcat)
		                                        		@if($subcat->parent_id == $category->id)
				                                        <label>
				                                            <input type="checkbox" name="category_id" value="{{ $subcat->id }}"> 
				                                            {{ $subcat->name }}
				                                        </label><br />                                        		
		                                        		@endif
		                                        	@endforeach
		                                        @endif	                                    		
	                                    	</div>
	                                    </div>
	                                    @endforeach
	                                @endif    

                                </div>
	                                <div class="panel-footer panel-footer-category">
	                                    <a href="{{ url('admin/category') }}">+ New category</a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-md-3">
	                        	<div class="form-group{{ $errors->has('product_pic') ? ' has-error' : '' }}">
	                        		<label for="product_pic">Upload Product Pic: </label>
	                        		<input type="file" name="product_pic" id="product_pic">
				                    @if ($errors->has('product_pic'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('product_pic') }}</strong>
				                        </span>
				                    @endif	                        		
	                        	</div>

	                        </div>
	                    </div>
                        <button class="btn btn-primary">Create</button>                   
                	</form>			                	
	            </div>
	        </div>
	    </div>
	</div>
</div>



@endsection