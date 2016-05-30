<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Total Products</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if($categories->count())
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->id }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        {{ $category->products()->count() }}
                    </td>
                    <td>

                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>

                        <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="clearfix"></div>
    <div class="pull-right">
        {{ $categories->render() }}
    </div>
</div>