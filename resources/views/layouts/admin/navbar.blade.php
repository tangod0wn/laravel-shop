<nav class="navbar navbar-default admin-navbar">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="#">
                The Grocer Admin
            </a>
      <div class="btn-group ">
        <button type="button" class="btn btn-primary navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          New <span class="badge">+</span>
        </button>
        <ul class="dropdown-menu admin_nav_btn">
          <li><a href="{{ route('category.index') }}">New Category</a></li>
          <li><a href="{{ route('product.new') }}">New Product</a></li>
          <li role="separator" class="divider"></li>
        </ul>
      </div> 
<a href="{{ route('message.new') }}" class="btn btn-primary" type="button">
  Messages <span class="badge">{{ theGrocer\Models\Message::new_message() }}</span>
</a>

<!-- <button class="btn btn-primary" type="button">
  Out Stock <span class="badge">4</span>
</button> -->

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
           
 

            @if (Auth::guard('admins'))
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{  auth()->guard('admins')->user()->username }} <span class="caret"></span>
                </button>

                <ul class="dropdown-menu admin_nav_btn">
                    <li>
                        <div class="navbar-content">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="http://placehold.it/120x120" alt="Alternate Text" class="img-responsive" />
                                    <p class="text-center small">
                                        <a href="#">Change Photo</a></p>
                                </div>
                                <div class="col-md-7 word-break">
                                    <span>{{  auth()->guard('admins')->user()->username }}</span>
                                    <p class="text-muted small">{{  auth()->guard('admins')->user()->email }}</p>
                                    <div class="divider">
                                    </div>
                                    <!-- <a href="#" class="btn btn-primary btn-sm active">Update Profile</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="navbar-footer">
                            <div class="navbar-footer-content">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-6">
                                        <a href="{{ url('/admin/logout') }}" class="btn btn-default btn-sm pull-right">Sign Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</nav>