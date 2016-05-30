@extends('layouts.admin.app')

@section('content')
<div class="col-md-11">
    <div class="row">
        <div class="col-md-10">
            <nav class="navbar navbar-default">
                <div class="container-fluid">                
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <button type="button" class="btn btn-primary navbar-btn">Create Product</button>
                            <button type="button" class="btn btn-primary navbar-btn">Create Category</button>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <button type="button" class="btn btn-primary navbar-btn">Out Stock Products&nbsp;<span class="badge">4</span></button>
                        </ul>
                    </div>                
                </div>            
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading custom-panel-heading">
                    <nav>
                        <div class="navbar-header">
                            <span class="navbar-brand">All Products</span>
                        </div>
                        <div class="container-fluid">
                            <ul class="nav navbar-right">
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
                            </ul>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by product name" aria-describedby="basic-addon2">
                                    <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-search"></span></span>
                                </div>
                            </form>
                        </div>                    
                    </nav>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price/Variants</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <div class="panel-product-image">
                                            <img src="images/fresh-fruit.jpeg">
                                        </div>
                                    </td>
                                    <td>Product name</td>
                                    <td>
                                        Category
                                        <br> &nbsp;&nbsp;&nbsp;&nbsp;--Subcategory

                                    </td>
                                    <td>5000tk / 1kg</td>
                                    <td>
                                        7 items
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Full View"><span class="glyphicon glyphicon-search"></span></button>
                                        <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <div class="panel-product-image">
                                            <img src="images/fresh-fruit.jpeg">
                                        </div>
                                    </td>
                                    <td>Product name</td>
                                    <td>Category</td>
                                    <td>5000tk / 1kg</td>
                                    <td>
                                        7 items
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Full View"><span class="glyphicon glyphicon-search"></span></button>
                                        <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <div class="panel-product-image">
                                            <img src="images/fresh-fruit.jpeg">
                                        </div>
                                    </td>
                                    <td>Product name</td>
                                    <td>Category</td>
                                    <td>5000tk / 1kg</td>
                                    <td>
                                        7 items
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Full View"><span class="glyphicon glyphicon-search"></span></button>
                                        <button class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        <ul class="pagination pull-right">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection