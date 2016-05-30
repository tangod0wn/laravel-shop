<nav>
    <div class="navbar-header">
        <span class="navbar-brand">All Categories</span>
    </div>
    <div class="container-fluid">
<!--         <ul class="nav navbar-right">
            <li>
                <div class="showing-items">
                    <form class="">
                        Show&nbsp;
                        <select class="">
                            <a href="{{ route('category.show_items', ['value' => 10]) }}">
                                <option>10</option>
                            </a>
                            <a href="{{ route('category.show_items', ['value' => 15]) }}">
                                <option>15</option>
                            </a>
                            <a href="{{ route('category.show_items', ['value' => 20]) }}">
                                <option>20</option>
                            </a>
                            <a href="{{ route('category.show_items', ['value' => 25]) }}">
                                <option>25</option>
                            </a>
                        </select>
                        &nbsp;entries
                    </form>
                </div>

            </li>
        </ul> -->
        <form action="{{ route('category.search') }}" class="navbar-form navbar-left" role="search">
            <div class="input-group">
                <input name="query" type="text" class="form-control" placeholder="Search by category name" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"></span></span>
            </div>
        </form>
    </div>
</nav>