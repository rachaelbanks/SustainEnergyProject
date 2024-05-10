{{-- Certificate Download --}}
<div class="container-fluid featurette bronze-background">
    <div class="container marketing">
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading" style="color: white;"">Bronze Certificate</h2>
                <p class="lead" style="color: white;">Well Done! Your Green points have earned you a <strong>bronze certificate</strong>!
                                                        You need over <strong>70</strong> to earn the silver certificate.
                                                        Please download your certificate using the button below.</p>
                                                        <a href="{{ route('download.pdf', ['filename' => 'bronze-certificate.pdf']) }}" class="custom-button" style="margin-bottom: 20px;">Download Bronze Certificate</a>
            </div>
                <div class="col-md-5">
                    <div class="col-md-5" style="padding-top: 40px;"> 
                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('storage/images/bronze.png') }}" alt="green image" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>