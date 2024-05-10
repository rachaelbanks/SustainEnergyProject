{{-- Certificate Download --}}
<div class="container-fluid featurette gold-background">
    <div class="container marketing">
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading" style="color: white;"">Gold Certificate</h2>
                <p class="lead" style="color: white;">Well Done! Your Green points have earned you a gold certificate!
                                                        Please download your certificate using the button below.</p>
                <a href="{{ route('download.pdf', ['filename' => 'gold-certificate.pdf']) }}" class="custom-button" style="margin-bottom: 20px;">Download Gold Certificate</a>
            </div>
                <div class="col-md-5">
                    <div class="col-md-5" style="padding-top: 40px;"> 
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('storage/images/gold.png') }}" alt="green image" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
</div>