<x-admin-layout.app title="Manage Products">
    <div class="container mt-4">
        <h2>🛍️ Products Management</h2>
        <a href="{{route('admin.products.create')}}" class="btn btn-primary mb-3">➕ Add New Product</a>
@if ($products->isEmpty())
        <div class="alert alert-warning">
            No products found.
        </div>
        @else

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                @if ($product->image)
                                <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="img-fluid" style="max-width: 100px;">
                                @else
                                No Image
                                @endif
                            </td>
                            <td>
                                @foreach ($product->categories as $category)
                                <span class="badge bg-secondary">{{$category->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">✏
                                    Edit</a>
                                <form action="#" method="POST"
                                      class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                                </form>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mx-2"></div>
        </div>
@endif
    </div>
</x-admin-layout.app>
