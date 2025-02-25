<x-admin-layout.app title="Categories">
    <div class="container mt-4">
        <h2>📂 Categories Management</h2>
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary mb-3">➕ Add New Category</a>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category )    
                    <tr>
                        <td> {{$loop->iteration }}</td>
                        <td>{{$category->name }}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            @if($category->image)
                            <img src="{{asset($category->image)}}" alt="{{ $category->name }}"
                                 style="height: 50px;">
                            @else
                            No Image

                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.categories.edit',$category)}}" class="btn btn-sm btn-warning">✏
                                Edit</a>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST"
                                  class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <div class="mx-2"></div>
        </div>
    </div>
</x-admin-layout.app>
