@extends('layouts.customer.app')

@section('content')
<div class="row">
  <div class="col-md-5">
    <hr>
  </div>
  <div class="col-md-3 text-center">
      <div class="content_header">
      Food
       </div>      
  </div>
  <div class="col-md-4">
    <hr>
  </div>
</div>

<div class="row">

  <div class="content-category-products text-center">

         <h1>Shopping Cart</h1>

        <div>
            <ul>
                <li><a class="add-to-cart" href="#" data-name="Apple long name long" data-price="1.22">Apple $1.22</a></li>
                <li><a class="add-to-cart" href="#" data-name="Banana" data-price="1.33">Banana $1.33</a></li>
                <li><a class="add-to-cart" href="#" data-name="Shoe" data-price="22.33">Shoe $22.33</a></li>
                <li><a class="add-to-cart" href="#" data-name="Frisbee" data-price="5.22">Frisbee $5.22</a></li>
                
            </ul>
            <button id="clear-cart">Clear Cart</button>
        </div>

        <hr> 

    <div class="cd-gallery">

    @foreach($products as $product)

      <div class="col-md-2 product_width">
        <div class="cd-single-item">
          <a href="#0">
            
            <img src="/upload/product/{{ $product->product_pic }}">
          </a>

          <div class="product_info">
            <div class="product_name">{{ $product->name }}</div>
            <div class="product_amount">{{ $product->variant }}</div>
            <div class="product_price">{{ $product->price }} tk</div>
            <div class="cd-customization">
              <button class="add-to-cart"  data-name="{{ $product->name }}" data-price="{{ $product->price }}" 
              data-image="{{ $product->product_pic }}" >
                <em><i class="fa fa-cart-plus cart_icon"></i>Add to Cart</em>
                <svg x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
                  <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" />
                </svg>
              </button>
            </div>
          </div>
          <!-- .cd-customization -->
        </div>
        <!-- .cd-single-item -->
        <!-- cd-item-info -->

      </div>

    @endforeach  

    </div>

  </div>

</div>
@endsection