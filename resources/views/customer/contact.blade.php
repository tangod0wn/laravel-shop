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
    <div class="help-page-content">
      <h3>Feel free to send us a message</h3>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form method="POST" action="{{ route('send.message') }}">
                {!! csrf_field()  !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">
                                Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" />
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif                            
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" /></div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif                                 
                        </div>
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label for="number">
                                Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                </span>
                                <input type="text" name="phone_number" class="form-control" id="number" placeholder="01850785098" />                                

                                </div>
                                        @if ($errors->has('phone_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif                                 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="name">
                                Message</label>
                            <textarea name="body" id="message" class="form-control" rows="9" cols="25" 
                                placeholder="Write your message"></textarea>
                                        @if ($errors->has('body'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('body') }}</strong>
                                            </span>
                                        @endif                                 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our Shop</legend>
            <address>
                <strong>The Grocer</strong><br>
                House No #01, Road No #01<br>
                South Khulshi, Zakir Hossain Road<br>
                Chittagong, Banhladesh.<br>
                <abbr title="Phone">
                    P:</abbr>
                +880 1766-668050
            </address>
            <address>
                <strong>Email</strong><br>
                <a href="mailto:#">thegrocer@gmail.com</a>
            </address>
            </form>
        </div>
    </div>      
    
    </div>
  </div>
  
  </div>

</div>
@endsection