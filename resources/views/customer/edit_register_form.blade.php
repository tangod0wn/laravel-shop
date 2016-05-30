@extends('layouts.customer.app') @section('content')

<div class="row">

  <div class="content-category-products">

    <div class="col-md-7 ">
      <div class="">

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
        
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Update your profile with the following fields.</h4>
          </div>
          <div class="modal-body">


            <div class="row well">
                    <form role="form" method="POST" action="{{ route('edit.profile', ['id' => $customer->id ]) }}">
                     {!! csrf_field() !!}                     
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name" value="{{ $customer->first_name }}" placeholder="First Name" class="form-control">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                                <div class="col-sm-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $customer->last_name }}" placeholder="Last Name" class="form-control">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>
                            </div> 
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label">Email Address</label>
                                <input type="email" name="email" value="{{ $customer->email }}"  placeholder="example@example.com" class="form-control">
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label">Password</label>
                                <input type="password" name="password" placeholder="password" class="form-control">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif                                 
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="control-label">Retype Password</label>
                                <input type="password" name="password_confirmation" placeholder="password" class="form-control">
                            </div>                                                    

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="control-label">Address</label>
                                <textarea name="address" value="{{ $customer->address }}"  placeholder="Enter Address Here" rows="3" class="form-control"></textarea>
                            </div> 
                            <div class="form-group{{ $errors->has('hold_name') ? ' has-error' : '' }}">
                                <label class="control-label">Hold Name</label>
                                <input type="text" name="hold_name" value="{{ $customer->hold_name }}"  placeholder="e.g. Anis Mansion" class="form-control">
                                    @if ($errors->has('hold_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_name') }}</strong>
                                        </span>
                                    @endif                                 
                            </div>                             
                            <div class="row">
                                <div class="col-sm-4 form-group{{ $errors->has('hold_no') ? ' has-error' : '' }}">
                                    <label class="control-label">Hold  No</label>
                                    <input type="text" name="hold_no" value="{{ $customer->hold_no }}"  placeholder="e.g. 20" class="form-control">
                                    @if ($errors->has('hold_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_no') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>  
                                <div class="col-sm-4 form-group{{ $errors->has('road_no') ? ' has-error' : '' }}">
                                    <label class="control-label">Road No</label>
                                    <input type="text" name="road_no" value="{{ $customer->road_no }}"  placeholder="e.g. 4" class="form-control">
                                    @if ($errors->has('road_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('road_no') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>  
                                <div class="col-sm-4 form-group{{ $errors->has('hold_area') ? ' has-error' : '' }}">
                                    <label class="control-label">Area</label>
                                    <input type="text" name="hold_area" value="{{ $customer->hold_area }}"  placeholder="e.g. Khulshi" class="form-control">
                                    @if ($errors->has('hold_area'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_area') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>      
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label class="control-label">Phone Number</label>
                                <input type="text" name="phone_number" value="{{ $customer->phone_number }}"  placeholder="Phone Number" class="form-control">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif                                 
                            </div>         

                            <button type="submit" class="btn btn-primary btn-block">Update</button>                   
                        </div>
                    </form>
            </div>
          </div>
        
      </div>
    </div>


<!--     <div class="col-md-4 login_register_form">
       <div class="header">
           Aready Registered? Login here!
       </div>     
      <div class="well">
        <form id="loginForm" method="POST" action="{{ url('/login') }}">
          {!! csrf_field() !!}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">Your Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}"> @if ($errors->has('email'))
            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Your Password</label>
            <input type="password" class="form-control" name="password"> @if ($errors->has('password'))
            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember Me?
            </label>

          </div>
          <button type="submit" class="btn btn-primary btn-block">Enter</button>
          <a href="{{ url('/password/reset') }}" class="btn btn-block">Forgot Your Password?</a>
        </form>
      </div>

    </div> -->







  </div>



</div>
@endsection