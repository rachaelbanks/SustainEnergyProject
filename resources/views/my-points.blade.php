<x-app-layout>
    <div class="py-12">

        <div class="container-fluid py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    {{-- Succes Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- Heading --}}
                    <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-black">
                        My Green Points
                    </h1>
                    <div class="row justify-content-center pt-4">
                        {{-- Card 1 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 points-light-card">
                                <div class="card-body">
                                    <h3><i class="fas fa-seedling"></i> Earned Points</h3>
                                    <p class="large-text">{{ $user->earned_points }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 points-blue-card">
                                <div class="card-body">
                                    <h3><i class="fas fa-leaf"></i> Total Green Points</h3>
                                    <p class="large-text">{{ $user->total_points }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- Card 2 --}}
                        <div class="col-md-4">
                            <div class="card mb-3 points-light-card">
                                <div class="card-body">
                                    <h3><i class="fas fa-money-bill-wave"></i> Voucher Points</h3>
                                    <p class="large-text">{{ $user->voucher_points }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-500 text-lg mt-1">Buy More Points!</p>
                    <a href="{{ url('/vouchers') }}" class="green-button">Buy a Voucher</a>
                </div>
            </div>
        </div>


        {{-- Certificate Download (Section depends on amount of points) --}}
        @if ($user->total_points >= 90)
            @include('certificate.gold')
        @elseif($user->total_points >= 70)
            @include('certificate.silver')
        @elseif($user->total_points >= 60)
            @include('certificate.bronze')
        @else
            @include('certificate.none')
        @endif


        {{-- Points History --}}
        <div class="container marketing py-5">
            <div class="row justify-content-left align-items-center">
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-success">
                    Green Points History
                </h1>
                    <h1>My Earned Points</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Total Points</th>
                                <th>Carbon Points</th>
                                <th>Renewable Points</th>
                                <th>Waste Points</th>
                                <th>Water Points</th>
                                <th>Supply Points</th>
                                <th>Biodiversity Points</th>
                                <th>Energy Points</th>
                                <th>Products Points</th>
                                <th>Transportation Points</th>
                                <th>Packaging Points</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $points->total_points }}</td>
                                <td>{{ $points->carbon_points }}</td>
                                <td>{{ $points->renewable_points }}</td>
                                <td>{{ $points->waste_points }}</td>
                                <td>{{ $points->water_points }}</td>
                                <td>{{ $points->supply_points }}</td>
                                <td>{{ $points->biodiversity_points }}</td>
                                <td>{{ $points->energy_points }}</td>
                                <td>{{ $points->products_points }}</td>
                                <td>{{ $points->transportation_points }}</td>
                                <td>{{ $points->packaging_points }}</td>
                                <td>{{ $points->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                <!-- Vouchers table -->
                <h2>Vouchers</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Points</th>
                            <th>Price</th>
                            <th>Purchased At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vouchers as $voucher)
                            <tr>
                                <td>{{ $voucher->points }}</td>
                                <td>{{ $voucher->price }}</td>
                                <td>{{ $voucher->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div><!-- /.container -->


    </div>
</x-app-layout>
