{{-- <x-layout.app title="register">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Register</h3>
            <form action="{{route('auth.register')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" >
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>

            <p class="text-center mt-3">
                already have an account? <a href="{{route('auth.login.form')}}">Login</a>
            </p>
        </div>
    </div>
</x-layout.app> --}}



<x-layout.app title="register">
   <x-form
       action="{{ route('auth.register') }}"
       method="POST"
       :fields="[
       ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
       ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
    //    ['name' => 'phone_number', 'label' => 'Phone Number', 'type' => 'text'],
    //    ['name' => 'address', 'label' => 'Address', 'type' => 'text'],
       ['name' => 'password', 'label' => 'Password', 'type' => 'password'],
       ['name' => 'password_confirmation', 'label' => 'Confirm Password', 'type' => 'password']
   ]"
       submitButtonName="ٌRegister"
   />
</x-layout.app>