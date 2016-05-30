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
	                	@include('admin.category.shared.flash-message')
						<div class="col-md-4">
						    <div class="panel panel-default create-box">
						        <div class="panel-heading">Edit Category</div>
						        <div class="panel-body">												        
						            <form action="{{ route('category.edit', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
						                {!! csrf_field() !!}
						                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						                    <label class="control-label" for="category">Category Name</label>
						                    <input type="text" name="name" value="{{ $category->name }}"class="form-control" id="category">
						                    @if ($errors->has('name'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('name') }}</strong>
						                        </span>
						                    @endif                    
						                </div>
						                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
						                    <label class="control-label" for="category">Slug</label>
						                    <input type="text" name="slug" value="{{ $category->slug }}"class="form-control" id="category">
						                    @if ($errors->has('slug'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('slug') }}</strong>
						                        </span>
						                    @endif                    
						                </div>
						                <div class="form-group">
						                    <label>Parent&nbsp;&nbsp;</label>
						                    <select name="parent_id" class="">
						                        
						                        @if($parent_categories->count())
						                            @foreach($parent_categories as $child_cat)

			                            				@if($child_cat->parent_id == 0)
						                            	<option <?php if(($category->parent_id == $child_cat->id)) echo "selected" ?> value="{{ $child_cat->id }}">
						                            		{{ $child_cat->name }}
						                            	</option>                 	
						                            	@endif
						                                        
						                            @endforeach	                         
						                            	<option <?php if(($category->parent_id == 0)) echo "selected" ?> value="0">
						                            		&mdash;&mdash;
						                            	</option>                   
						                        @endif

										                        
						                    </select>
						                </div>

	                        			<div class="form-group{{ $errors->has('category_pic') ? ' has-error' : '' }}">
			                        		<label for="category_pic">Upload Category Pic: </label>
			                        		<input type="file" name="category_pic" id="category_pic">
						                    @if ($errors->has('category_pic'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('category_pic') }}</strong>
						                        </span>
						                    @endif	                        		
			                        	</div>	

						                <div class="form-group">
						                    <label for="description">Description</label>
						                    <textarea name="description" value="{{ $category->description }}" class="form-control" rows="3"></textarea>
						                </div>
			
						                <div class="pull-right">
						                    <button type="submit" class="btn btn-primary">Update</button>
						                </div>	                                    
						            </form>
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