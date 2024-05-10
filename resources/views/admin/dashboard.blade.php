<x-admin-layout>
    <div class="pt-4 text-center">
        <h2 class="font-weight-bold text-xl">
            ADMIN DASHBOARD
        </h2>
        <p> Welcome to the admin dashboard! You can view the information from the database using the navigation bar
            above.
    </div>


    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center pt-4">
                {{-- Card 1 --}}
                <div class="col-md-4">
                    <div class="card mb-3 admin-card">
                        <div class="card-body">
                            <h3><i class="fas fa-users"></i> Total Users</h3>
                            <p class="large-text">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
                {{-- Card 2 --}}
                <div class="col-md-4">
                    <div class="card mb-3 admin-card">
                        <div class="card-body">
                            <h3><i class="fas fa-user"></i> Total Member Income</h3>
                            <p class="large-text">{{ $totalMemberIncome }}</p>
                        </div>
                    </div>
                </div>
                {{-- Card 3 --}}
                <div class="col-md-4">
                    <div class="card mb-3 admin-card">
                        <div class="card-body">
                            <h3><i class="fas fa-money-bill-wave"></i> Total Vouchers Income</h3>
                            <p class="large-text">£{{ $totalVouchersIncome }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
