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
        @foreach($products as $product)
        <tbody>
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    <div class="panel-product-image">
                        <img src="/upload/product/{{ $product->product_pic }}">
                    </div>
                </td>
                <td>{{ str_limit($product->name, 12) }}</td>
                <td>
                    {{ $product->category->name }}
                    <!-- <br> &nbsp;&nbsp;&nbsp;&nbsp;--Subcategory -->


                </td>
                <td>{{ $product->price }} tk / {{ $product->variant }} {{ $product->unit }}</td>
                <td>
                    @if($product->stock == true) {{ "In stock" }} @else {{ "Out Stock" }} @endif
                </td>
              
                <td>
                    
                    <a href="{{ route('product.edit', ['id' => $product->id ]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>

                    <a href="{{ route('product.delete', ['id' => $product->id ]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>

        </tbody>
        @endforeach

    </table>
    <div class="clearfix"></div>
    <div class="pull-right">
        {{ $products->render() }}
    </div>
</div>