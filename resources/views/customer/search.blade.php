@extends('layouts.customer.app')

@section('content')
<div class="row">
  <div class="col-md-5">
    <hr>
  </div>
  <div class="col-md-3 text-center">
      <div class="content_header">
        
      </div>      
  </div>
  <div class="col-md-4">
    <hr>
  </div>
</div>

<div class="row">

  <div class="content-category-products text-center">

    <div class="cd-gallery">

    @foreach($products as $product)

      <div class="col-md-2 product_width">

      <form method="POST" action="{{ url('/cart/add') }}">
       {!! csrf_field() !!}
        <div class="cd-single-item">
          <a href="#0">            
            <img src="/upload/product/{{ $product->product_pic }}">
          </a>
          <div class="product_info">
            <div class="product_name">{{ $product->name }}</div>
            <div class="product_amount">
              {{ $product->variant }}
              <input type="hidden" name="amount" value="{{ $product->variant }}">
            </div>
            <div class="product_price">{{ $product->price }} tk</div>
            <div class="cd-customization">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="btn-group">  
              <button type="button" class="btn btn-danger"><i class="fa fa-cart-arrow-down"></i></button>
              <button type="submit" class="btn btn-danger">Add to cart</button>  
            </div>
            </div>
          </div>
        </div>
      </form>

      </div>

    @endforeach 

    <div class="clearfix"></div>
    <div class="customer-pagination">
        {{ $products->render() }}
    </div>

    </div>

  </div>

</div>
@endsection