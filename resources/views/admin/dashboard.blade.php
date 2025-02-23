    <h1 class="mb-4">👋 Welcome, </h1>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="dropdown-item text-danger">Logout</button>
    </form>