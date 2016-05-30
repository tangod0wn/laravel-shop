<nav class="navbar navbar-default">
    <div class="container-fluid">                
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <a href="{{ route('category.index') }}" class="btn btn-default navbar-btn">Create Category</a>
                <a href="{{ route('product.new') }}" class="btn btn-default navbar-btn">Create Product</a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a class="btn btn-danger navbar-btn">Out Stock Products&nbsp;<span class="badge">4</span></a>
            </ul>
        </div>                
    </div>            
</nav>