<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'iti_store' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @if(!in_array(Route::currentRouteName(), ['auth.login.form', 'auth.register.form', 'admin.login.form']))
        <x-navbar/>
{{-- Navbar --}}
    @endif

@if (session()->has('success'))
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container top-0 end-0 p-3">
            <!-- Then put toasts within -->
            <div id="successToast" class="toast text-white bg-success toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

@error('error')
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container top-0 end-0 p-3">
        <!-- Then put toasts within -->
        <div id="successToast" class="toast text-white bg-danger toast-custom" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
</div>
@enderror

<div class="container">
    {{ $slot }}
</div>

@if(!in_array(Route::currentRouteName(), ['auth.login.form', 'auth.register.form', 'admin.login.form']))
<x-footer/>
{{-- Navbar --}}
@endif
{{-- Footer --}}

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let successToast = document.getElementById('successToast');
        if (successToast) {
            let toast = new bootstrap.Toast(successToast);
            toast.show();
            setTimeout(() => {
                toast.hide();
            }, 3000); // hide toast after 3 seconds
        }
    });
</script>
</body>
</html>