@extends('layouts.customer.app')

@section('content')
<div class="row">

  <div class="content-category-products">

        <div class="col-md-7 registration_form">
        <div class="panel panel-default">
            <div class="panel-heading">Registration</div>
            <div class="panel-body">
                <div class="row ">
                    <form role="form" method="POST" action="{ url('/register') }}">
                     {!! csrf_field() !!}                     
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" class="form-control">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif                                    
                                </div>
                                <div class="col-sm-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" class="form-control">
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>
                            </div> 
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label">Email Address</label>
                                <input type="email" name="email" placeholder="example@example.com" value="{{ old('email') }}" class="form-control">
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
                                <textarea name="address" placeholder="Enter Address Here" rows="3" class="form-control" value="{{ old('address') }}"></textarea>
                            </div> 
                            <div class="form-group{{ $errors->has('hold_name') ? ' has-error' : '' }}">
                                <label class="control-label">Hold Name</label>
                                <input type="text" name="hold_name" placeholder="e.g. Anis Mansion" value="{{ old('hold_name') }}" class="form-control">
                                    @if ($errors->has('hold_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_name') }}</strong>
                                        </span>
                                    @endif                                 
                            </div>                             
                            <div class="row">
                                <div class="col-sm-4 form-group{{ $errors->has('hold_no') ? ' has-error' : '' }}">
                                    <label class="control-label">Hold  No</label>
                                    <input type="text" name="hold_no" placeholder="e.g. 20" value="{{ old('hold_no') }}" class="form-control">
                                    @if ($errors->has('hold_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_no') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>  
                                <div class="col-sm-4 form-group{{ $errors->has('road_no') ? ' has-error' : '' }}">
                                    <label class="control-label">Road No</label>
                                    <input type="text" name="road_no" placeholder="e.g. 4" value="{{ old('road_no') }}" class="form-control">
                                    @if ($errors->has('road_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('road_no') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>  
                                <div class="col-sm-4 form-group{{ $errors->has('hold_area') ? ' has-error' : '' }}">
                                    <label class="control-label">Area</label>
                                    <input type="text" name="hold_area" placeholder="e.g. Khulshi" value="{{ old('hold_area') }}" class="form-control">
                                    @if ($errors->has('hold_area'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hold_area') }}</strong>
                                        </span>
                                    @endif                                     
                                </div>      
                            </div>
                            
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label class="control-label">Phone Number</label>
                                <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" class="form-control">
                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif                                 
                            </div>         

                            <button type="submit" class="btn btn-danger">Submit</button>                   
                        </div>
                    </form> 
                </div>
            </div>
        </div>

        </div> 

  </div>

</div>
@endsection
