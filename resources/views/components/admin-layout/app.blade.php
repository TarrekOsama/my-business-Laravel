<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    {{--    sweet alert--}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

{{--Display success messages--}}
@if (session()->has('success'))
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container top-0 end-0 p-3">
            <!-- Then put toasts within -->
            <div id="successToast" class="toast text-white bg-success toast-custom" role="alert" aria-live="assertive"
                 aria-atomic="true">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

{{--Display error messages--}}
@error('error')
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container top-0 end-0 p-3">
        <!-- Then put toasts within -->
        <div id="successToast" class="toast text-white bg-danger toast-custom" role="alert" aria-live="assertive"
             aria-atomic="true">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
</div>
@enderror

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
        <h4 class="mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{route('admin.dashboard')}}" class="nav-link text-white">📊 Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{route('admin.products.index')}}" class="nav-link text-white">🛍️ Products</a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{route('admin.categories.index')}}" class="nav-link text-white">📂 Categories</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">👥 Users</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">📦 Orders</a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link text-white">⚙️ Settings</a>
            </li>
            <li class="nav-item mt-4">
                <form action="{{route('admin.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid p-4" style="flex: 1;">
        {{ $slot }}
    </div>
</div>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    //show toaster when success or error occurred
    document.addEventListener("DOMContentLoaded", function () {
        let successToast = document.getElementById('successToast');
        if (successToast) {
            let toast = new bootstrap.Toast(successToast);
            toast.show();
            setTimeout(() => {
                toast.hide();
            }, 4000); // hide toast after 3 seconds
        }
    });


    // When a form with the class 'delete-form' is submitted...
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        });
    });
</script>
{{--sweet alert--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
