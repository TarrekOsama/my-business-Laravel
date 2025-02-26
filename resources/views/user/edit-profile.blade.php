<x-layout.app>
    <div class="container mt-5 pt-5">
        <h2>✏️ Edit Profile</h2>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name',$user->name) }}" >
                         @error('name')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>
                  
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" 
                        class="form-control @error('email') is-invalid @enderror"
                         value="{{ old('email',$user->email )}}" >
                         @error('email')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>
  
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number"
                         class="form-control @error('phone_number') is-invalid @enderror"
                          value="{{ old('phone_number',$user->phone_number) }}" >
                          @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address"
                         class="form-control @error('address') is-invalid @enderror" 
                         value="{{ old('address',$user->address )}}" >
                         @error('address')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>