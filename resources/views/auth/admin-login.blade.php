<x-layout.app title="Admin Login">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Admin Login</h3>
@error('admin-login-error')
            <div class="text-danger">{{ $message }}</div>
@enderror
            <form action="{{route('admin.login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="admin@example.com" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" >
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</x-layout.app>