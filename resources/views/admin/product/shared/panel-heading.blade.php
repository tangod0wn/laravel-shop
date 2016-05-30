<nav>
    <div class="navbar-header">
        <span class="navbar-brand">All Products</span>
    </div>
    <div class="container-fluid">
<!--         <ul class="nav navbar-right">
            <li>
                <div class="showing-items">
                    <form class="form-inline">
                        <div class="">
                            Show&nbsp;
                            <select class="">
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>25</option>
                            </select>
                            &nbsp;entries
                        </div>
                    </form>
                </div>

            </li>
        </ul> -->
        <form action="{{ route('product.search') }}" class="navbar-form navbar-left" role="search">
            <div class="input-group">
                <input name="query" type="text" class="form-control" placeholder="Search by product name" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"></span></span>
            </div>
        </form>
    </div>
</nav>