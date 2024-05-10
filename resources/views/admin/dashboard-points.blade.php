<x-users-layout>

    <div class="container mt-5">
        <div class="row">
            <h1>User Points</h1>
        </div>
        <div class="row">
            @if($points->isEmpty())
            <p>No points recorded yet.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
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
                    @foreach($points as $point)
                    <tr>
                        <td>{{ $point->id }}</td>
                        <td>{{ $point->user_id }}</td>
                        <td>{{ $point->total_points }}</td>
                        <td>{{ $point->carbon_points }}</td>
                        <td>{{ $point->renewable_points }}</td>
                        <td>{{ $point->waste_points }}</td>
                        <td>{{ $point->water_points }}</td>
                        <td>{{ $point->supply_points }}</td>
                        <td>{{ $point->biodiversity_points }}</td>
                        <td>{{ $point->energy_points }}</td>
                        <td>{{ $point->products_points }}</td>
                        <td>{{ $point->transportation_points }}</td>
                        <td>{{ $point->packaging_points }}</td>
                        <td>{{ $point->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</x-users-layout>