<x-admin-layout.app>
    <div class="container mt-4">
        <h2>➕ Add New Category</h2>

        <div class="card shadow">
            <div class="card-body">
                <form action="#" method="POST">
{{--                    mass_assigment--}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control >
{{--                        error_message--}}
                        <div class="invalid-feedback"></div>
{{--                        end_error_message--}}
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Category Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control >
{{--                        error_message--}}
                        <div class="invalid-feedback"></div>
            {{--                        end_error_message--}}
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        {{--                        error_message--}}
                        <div class="invalid-feedback"></div>
                        {{--                        end_error_message--}}
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="#" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout.app>
