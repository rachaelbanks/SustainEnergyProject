<x-users-layout>

    <div class="container mt-5">
        <div class="row">
            <h1>Vouchers</h1>
        </div>
        <div class="row">
            @if($vouchers->isEmpty())
            <p>No vouchers registered yet.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User_ID</th>
                        <th>Points</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->id }}</td>
                        <td>{{ $voucher->user_id }}</td>
                        <td>{{ $voucher->points }}</td>
                        <td>{{ $voucher->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</x-users-layout>


