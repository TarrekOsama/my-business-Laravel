<x-layout.app>
    <div class="container mt-5 pt-5">
        <h2>👤 User Profile</h2>
        <div class="card shadow mt-3">
            <div class="card-body">
                <!-- Display User Information -->
                <div class="mb-3">
                    <strong>Name:</strong> {{ $user->name }}
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> {{ $user->email }}
                </div>
                <div class="mb-3">
                    <strong>Phone Number:</strong> {{ $user->phone_number }}
                </div>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $user->address }}
                </div>

                <!-- Edit Profile Button -->
                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</x-layout.app>