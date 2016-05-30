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
@if(Session::has('success'))
    <div class="flash-message flash-message-success">
        {{ Session::get('success') }}
    </div>
@endif
@if(Session::has('warning'))
    <div class="flash-message flash-message-warning">
        {{ Session::get('warning') }}
    </div>
@endif
    <div class="cd-gallery">
<form action="" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_iWbTwBF14q313aMkMNntjTqU"
    data-amount="999"
    data-name="Demo Site"
    data-description="Widget"
    data-image="/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form> 

    </div>

  </div>

</div>
@endsection