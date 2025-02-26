<x-admin-layout.app title="Edit Product">
    <div class="container mt-4">
        <h2>✏ Edit Product</h2>

        <div class="card shadow">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- PUT method here --}}

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name', $product->name) }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-3">
                        <label for="slug" class="form-label">Product Slug</label>
                        <input type="text" name="slug" id="slug"
                               value="{{ old('slug', $product->slug) }}"
                               class="form-control @error('slug') is-invalid @enderror">
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Product Description</label>
                        <textarea name="description" id="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" id="price"
                               value="{{ old('price', $product->price) }}"
                               class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" id="stock"
                               value="{{ old('stock', $product->stock) }}"
                               class="form-control @error('stock') is-invalid @enderror">
                        @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" name="image" id="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        {{-- check if the product image exist --}}
                        <div class="mt-2">
                            <img src="" alt=""
                                 style="max-height: 150px;">
                        </div>
                        {{-- end if --}}
                    </div>

                    <!-- Categories -->
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        {{-- name must be of type array (categories[])--}}
                        <select name="" id="categories" class="form-control" multiple>
                            {{-- loop in categories array to display it --}}
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout.app>
