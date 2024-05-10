<x-app-layout>
    {{-- Heading --}}
    <div class="container-fluid py-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-700">
                    Purchase <span class="text-success">Green</span> Vouchers
                </h1>
                <p class="text-gray-500 text-lg mt-1">Are you short on <strong>Green Points</strong>?</p>
                <p>Purchase some here, all proceeds go to green charity efforts!</p>
            </div>
        </div>
    </div>

    {{-- Vouchers Form --}}
    <div class="row justify-content-center">
        <div class="col-sm-10 d-flex justify-content-center">
            <div class="card" style="padding: 30px;  width: 80%; margin-bottom: 10px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="h4 font-weight-medium text-dark">
                            {{ __('Buy Vouchers') }}
                        </h2>

                        <p class="mt-1 text-sm text-muted">
                            {{ __('Each point costs £10. Enter the amount of points you would like') }}
                        </p>

                        <form action="{{ route('vouchers.store') }}" method="POST" id="vouchers" onsubmit="return confirmPurchase()"> 
                            @csrf <!-- CSRF protection -->
                            <div class="form-group">
                                <label for="points">Points:</label>
                                <input type="number" class="form-control" id="points" name="points" placeholder="Enter points" style="width: 100%;" min="1" max="100" oninput="updatePrice()">
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Price:</label>
                                <span id="price">£0</span>
                            </div>
                            <button type="submit" class="green-button">{{ __('Buy Now') }}</button>
                        </form>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('storage/images/bee.jpg') }}" alt="Voucher Image" style="max-width: 100%; max-height: 200px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function confirmPurchase() {
        var points = document.getElementById('points').value;
        var price = points * 10;

        // Fetch and display user's card number
        var cardNumber = '{{ $userCardDetail->card_number }}';
        var lastFourDigits = cardNumber.substr(-4);
        return confirm('Are you sure you wish to pay £' + price + ' for ' + points + 
        ' points? Using this card. Your card number ends with: ****' + lastFourDigits);
    }


    function updatePrice() {
        var points = document.getElementById('points').value;
        var price = points * 10;
        document.getElementById('price').innerText = '£' + price;
    }
</script>
