@extends('layouts.customer.app')

@section('banner')
<div class="row">
  <div class="col-md-12">
      @include('layouts.customer.banner')
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-5">
    <hr>
  </div>
  <div class="col-md-2 text-center">
    <div class="content_header">
      Food
    </div>
  </div>
  <div class="col-md-5">
    <hr>
  </div>
</div>

<div class="row">

  <div class="content-category-products text-center">

  @foreach($categories as $category) 
    @if($category->slug == "foods" )
        @foreach($category_with_parent_id as $subcat)
            @if($subcat->parent_id == $category->id)                          
    		    <div class="col-md-2 content-category-product">
    		      <div class="content-category-product-img">
    		        <img src="/upload/category/{{ $subcat->category_pic }}">
    		      </div>
    		      <div class="content-category-name">
    		        <a href="{{ route('products.show', ['id' => $subcat->id ]) }}">{{ $subcat->name }}</a>
    		      </div>
    		    </div> 
            @endif
        @endforeach
    @endif
  @endforeach    

  </div>
</div>
@endsection