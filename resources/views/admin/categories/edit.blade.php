<x-admin-layout.app>
    <div class="container mt-4">
        <h2 class="mb-4">✏ Edit Category</h2>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name', $category->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                        >
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file"
                               name="image"
                               id="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if($category->image)
                            <div class="mt-2">
                                <img src="{{asset($category->image)}}" alt="{{ $category->name }}"
                                     style="max-height: 150px;">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout.app>
