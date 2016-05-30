<nav class="animate checkbar">
  <div class="row">
    <div class="check_cart_title col-md-12">
      <div>Total Items: <span id="count-cart">X</span>&nbsp;&nbsp;&nbsp; Total Cart: $<span id="total-cart"></span>
      </div>
    </div>
  </div>
  <div>
  <form  method="GET" action="{{ url('/order') }}"> 
   {!! csrf_field() !!}  
    <div class="products_in_cart" id="show-cart">
      <div>???????</div>
    </div>
    <button type="submit" class="btn btn-primary btn-block send-btn">Place Order</button>
  </form>  
  </div>
</nav>