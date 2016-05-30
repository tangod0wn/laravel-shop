<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="logo-text"><a class="navbar-brand" href="/">The Grocer</a></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form action="{{ route('search') }}" class="navbar-form navbar-left navbar-search-form" role="search">      
        <div class="input-group">
          <input type="text" name="query" class="form-control navbar-form-inner" placeholder="Search for product (e.g. egg, milk )">
          <span class="input-group-btn">
          <button class="btn btn-danger navbar-search-btn" type="submit"><i class="fa fa-search-plus"></i>
          </button>
        </span>
        </div>
      </form>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="help-link">
            <a href="{{ route('help') }}">Need Help?</a>
          </li>

        </ul>
      </div>
      <ul class="nav navbar-nav navbar-right">

        @if(!Auth::check())

          <li class="dropdown login-btn">
              <button href="#" class="btn btn-danger navbar-btn" data-toggle="dropdown"><b>LOGIN</b> <span class="caret"></span>
              </button>
              <ul id="login-dp" class="dropdown-menu">
                <li>
                  <div class="row">
                    <div class="col-md-12">

                      <form class="form" role="form" method="post" action="{{ url('/login') }}" id="login-nav">
                      {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="sr-only" for="exampleInputEmail2">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" value="{{ old('email') }}">
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="sr-only" for="exampleInputPassword2">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                          <div class="help-block text-right"><a href="{{ url('/password/reset') }}">Forget the password ?</a></div>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="remember"> keep me logged-in
                          </label>
                        </div>
                      </form>
                    </div>
                    <div class="bottom text-center">
                      New here ? <a href="{{ url('/register') }}"><b>Register Now</b></a>
                    </div>
                  </div>
                </li>
              </ul>
          </li>

        @else
      
           <li class="dropdown login-btn">
              <button href="#" class="btn btn-danger navbar-btn" data-toggle="dropdown"><b>{{ Auth::user()->first_name }}</b> <span class="caret"></span>
              </button>
          <ul class="dropdown-menu">

            <li><a href="{{ route('cart.index') }}">Your cart <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="{{ route('edit.profile', ['id' => Auth::user()->id ]) }}">Edit Profile <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>            
            <li><a href="{{ url('/logout') }}">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
          </ul>              
          </li>
        @endif


      </ul>
    </div>
    
  </div>
</nav>