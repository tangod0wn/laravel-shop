@extends('layouts.customer.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
<!--             <div class="panel panel-default">
                <div class="panel-heading"><b>Login</b></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="col-md-6 col-md-offset-4">
                                 New Here?<a class="btn btn-link" href="{{ url('/register') }}">Register Now.</a>
                            </div>
                        </div>                        

                    </form>
                </div>
            </div> -->
   <div class="modal-dialog">
      <div class="login_box">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login to your account</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="{{ url('/login') }}">
                           {!! csrf_field() !!}
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="control-label">Your Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                              </div>
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="control-label">Your Password</label>
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">New Customer? <span class="text-success"> Register Here!</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Free 1 hour delivery.</li>
                          <li><span class="fa fa-check text-success"></span> Same price as your bajar.</li>
                          <li><span class="fa fa-check text-success"></span> Dont like something? Return it.</li>
                          <li><span class="fa fa-check text-success"></span> Choose from over 5000 products</li>
                          <li><span class="fa fa-check text-success"></span> Save 3% on your first order  </li>
                          <li><span class="fa fa-check text-success"></span> Order for any time.  </li>
                          
                      </ul>
                      <p class="register_link"><a href="{{ url('/register') }}" class="btn btn-danger btn-block">Click to register here.</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>



        </div>



@endsection
