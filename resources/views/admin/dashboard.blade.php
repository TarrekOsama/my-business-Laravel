<x-admin-layout.app>
    <h2 class="mb-4">👋 Welcome, {{ Auth::guard('admin')->user()->name }}</h2>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow p-3 bg-danger text-white">
                <h5>👥 Total Users</h5>
                <h3>1,245</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 bg-success text-white">
                <h5>📦 New Orders</h5>
                <h3>342</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow p-3 bg-secondary text-dark">
                <h5>💰 Revenue</h5>
                <h3>$12,560</h3>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="card shadow mt-4">
        <div class="card-header bg-dark text-white">
            <h5>📦 Recent Orders</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mohamed Ahmed</td>
                    <td>120 EGP</td>
                    <td><span class="badge bg-success">Completed</span></td>
                    <td>
                        <button class="btn btn-sm btn-info">View</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Khaled Ali</td>
                    <td>85 EGP</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-sm btn-info">View</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sarah Hassan</td>
                    <td>150 EGP</td>
                    <td><span class="badge bg-danger">Canceled</span></td>
                    <td>
                        <button class="btn btn-sm btn-info">View</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout.app>