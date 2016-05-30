@extends('layouts.customer.app')

@section('content')
<div class="row">

  <div class="help-page">
  <div class="col-md-12">
    <div class="help-banner">
      <img src="/promo/need.jpg">
    </div>
    <div class="help-nav">      
      <ul class="navbar-nav">
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('about_us') }}">About Us</a></li>
        <li><a href="{{ route('contact_us') }}">Contact Us</a></li>
        <li><a href="{{ route('terms') }}">Terms of use</a></li>
        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
      </ul>      
    </div>
  </div>
  
  </div>

</div>
@endsection