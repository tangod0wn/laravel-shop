@extends('layouts.customer.app')

@section('content')


<div class="row">

  <div class="content-category-products text-center">
 

  <div class="col-md-8">
  <div class="checkout_box">
  @if(Session::has('success'))
    <div class="flash-message flash-message-success">
        {{ Session::get('success') }}
    </div>
@endif
  
  @if(count($products_in_cart))
    <div class="check_box_heading">Review your shopping cart</div>
    <table class="table">
      <thead>
      <tr>
        <th>Items</th>
        <th class="quantity">Quantity</th>
        <th>Price </th>
        <th>Total </th>
        <th>Action </th>
      </tr>
      </thead>

      <tbody>
        @foreach($products_in_cart as $cart_item)
          <tr>
              <td>
                <div class="chekout_product_image pull-left">
                  <img src="/upload/product/{{ $cart_item->Products->product_pic }}">
                </div>
                <div class="chekout_product_name">
                  {{ $cart_item->Products->name }}
                </div>
              </td>
              <form method="POST" action="{{ route('cart.update', ['id' => $cart_item->id ]) }}">
              {!! csrf_field() !!} 
              <td>
                  <div class="input-group">
                      <input type="text" name="amount" class="form-control cart-amount-inner" value="{{ $cart_item->amount }}">
                  </div>
              </td>
              <td>
                $ {{ $cart_item->Products->price }}
              </td>
              <td>
                $  {{ $cart_item->total }}
              </td>
              <td>
                <p><button type="submit">Update</button></p>
              </form>  

                <form method="POST" action="{{ route('cart.delete', ['id' => $cart_item->id]) }}">
                 {!! csrf_field() !!} 
                  <input type="hidden" name="id">
                  <p><button type="submit">Remove</button></p>
                </form>
              </td>              
          </tr> 
        @endforeach  
      </tbody>
      <tfoot>
      <tr>        
        <th>Total </th>
        <th>$ {{ $products_in_cart_total }}</th>
      </tr>
      </tfoot>           
    </table>
  @else
    <div class="check_box_heading">You did not add any product in your cart!</div>
  @endif  
  </div>


  </div>

  
  <div class="col-md-4" >
    <div class="panel panel-default shipping-panel">
    <div class="panel-heading">Shipping To</div>
    <div class="panel-body shipping_address">
        <address>
          <span class="name">{{ Auth::user()->fullname() }}</span><br>
          <span class="email"> {{ Auth::user()->email }}</span><br>
          <span class="cell"> {{ Auth::user()->phone_number }}</span><br>
          <span class="address_heading">Address</span><br>
          <span class="hold_name">Hold Name: {{ Auth::user()->hold_name }} </span><br>
          <span class="hold_no"> Hold No: {{ Auth::user()->hold_no }}, Road no: {{ Auth::user()->road_no }} </span><br>
          <span class="hold_area"> Area: {{ Auth::user()->hold_area }}</span><br>
          <span class="address">Address: {{ Auth::user()->address }} </span><br>
        </address>
      @if(count($products_in_cart))       
        <form method="POST" action="{{ url('/order/create') }}">
        {!! csrf_field() !!} 
          <a class="change_address" role="button" data-toggle="collapse" href="#collapseAddress" aria-expanded="false" aria-controls="collapseAddress">
            Change Address?
          </a>
          <div class="collapse" id="collapseAddress">
            <div class="">
              <textarea name="address" class="well address-textarea" placeholder="Hold no #, Road no #, Area # "></textarea>
            </div>
          </div>

          <a class="change_address" role="button" data-toggle="collapse" href="#collapseMessage" aria-expanded="false" aria-controls="collapseMessage">
            Give any message?
          </a>
          <div class="collapse" id="collapseMessage">
            <div class="">
              <textarea name="message" class="well address-textarea" placeholder="Give a short message if you need"></textarea>
            </div>
          </div>          


        
          <div class="">
            <button type="submit" class="btn btn-danger btn-block place-btn">Place order</button>
          </div>
        </form>
      @endif


    </div>  
    </div> 
    
  </div>  

  </div>
</div>
@endsection