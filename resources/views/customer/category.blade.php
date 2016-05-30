@extends('layouts.customer.app')

@section('content')
<div class="row">
  <div class="col-md-5">
    <hr>
  </div>
  <div class="col-md-3 text-center">
      <div class="content_header">
        {{ $category->name }}
      </div>      
  </div>
  <div class="col-md-4">
    <hr>
  </div>
</div>

<div class="row">

  <div class="content-category-products text-center">


	

  </div>

</div>
@endsection