{{-- Certificate Download --}}
<div class="container-fluid featurette dark-green-background">
    <div class="container marketing">
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading" style="color: white;"">No Certificate Yet!</h2>
                <p class="lead" style="color: white;">Sorry, you have not earned enough points to earn a certificate yet. Please complete Green activities or purchase vouchers to earn some green points.
                                                        You need <strong>60</strong> green points to earn your first certificate.</p>
                <a href="{{ url('/earn-points') }}" class="custom-button">Enter Activities</a>
                <a href="{{ url('/vouchers') }}" class="custom-button">Purchase Points</button></a>
            </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('storage/images/hands-square.jpg') }}"
                        alt="green image">
                </div>
        </div>
    </div>
</div>