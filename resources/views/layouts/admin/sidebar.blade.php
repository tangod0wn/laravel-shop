<div class="col-md-1 left-sidebar-menu">
    <div class="list-group">
        <a href="{{ route('admin.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-plane"></h4>
            <br/>Dashboard
        </a>
        <a href="{{ route('product.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-road"></h4>
            <br/>Products
        </a>
        <a href="{{ route('category.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-road"></h4>
            <br/>Category
        </a>
        <a href="{{ route('order.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-home"></h4>
            <br/>Orders
        </a>
        <a href="{{ route('customer.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-cutlery"></h4>
            <br/>Customers
        </a>
        <a href="{{ route('message.index') }}" class="list-group-item text-center">
            <h4 class="glyphicon glyphicon-credit-card"></h4>
            <br/>Messages
        </a>
    </div>
</div>