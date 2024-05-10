<x-app-layout>
    <div class="py-12">

        <div class="container-fluid py-5">
            <div class="row justify-content-center align-items-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-12 text-center">
                    <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-700">
                        Welcome to <span class="text-success">Sustain Energy</span>
                    </h1>
                    <p class="text-gray-500 text-lg mt-1">Creating a greener planet!</p>
                    {{-- <button class="custom-button">Become A Member</button> --}}
                </div>
            </div>
        </div>


        {{-- OUR MISSION --}}
        <div class="container-fluid featurette dark-green-background">
            <div class="container marketing">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="featurette-heading" style="color: white;"">OUR MISSION</h2>
                        <p class="lead" style="color: white;">At Sustain Energy, our mission is to create a greener
                            world by
                            empowering companies to embrace sustainable practices. We hold them accountable for their
                            environmental
                            actions and encourage them to strive for excellence to earn a Gold Sustain Energy
                            Certificate. Together,
                            we're forging a brighter, cleaner future for generations to come.</p>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto"
                            src="{{ asset('storage/images/hands-square.jpg') }}" alt="green image">
                    </div>
                </div>
            </div>
        </div>


        {{-- Member Benefits --}}
        <div class="container marketing py-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center">
                    <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-700">
                        Member Benefits
                    </h1>
                </div>
            </div>
            <div class="row py-3">
                {{-- BENEFITS 1 --}}
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('storage/images/green-products.jpg') }}"
                        alt="Company Logo" width="140" height="140">
                    <h2>Raises Standards</h2>
                    <p>Sustain Energy, provides their members with the latest information on green buisness practices.
                        Ensuring they strive to achieve our yearly <strong>10 Green Actions</strong> to earn points.
                    </p>
                </div>

                {{-- BENEFITS 2 --}}
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('storage/images/green-team.jpg') }}" alt="Gold"
                        width="140" height="140">
                    <h2>Certificate</h2>
                    <p>Once you have earned points, you can start working towards a bronze, silver and then gold
                        certificate.
                        If you are lacking points and need a boost, consider purchasing points. Profits go towards our
                        mission to encourage companies to have greener business practices!
                    </p>
                    <p><button class="custom-button">PURCHASE POINTS!</button></p>
                </div>

                {{-- BENEFITS 3 --}}
                <div class="col-lg-4">
                    <img class="rounded-circle" src="{{ asset('storage/images/green-energy.jpg') }}" alt="Company Logo"
                        width="140" height="140">
                    <h2>Reputation</h2>
                    <p>Our lucky members can use our logo and name, to show they are dedicated to making their company
                        green.
                        Potential customers and clients love to see a company is commited to take care of the earth and
                        our future.
                    </p>
                </div>
            </div><!-- /.row -->

        </div><!-- /.container -->


    </div>
</x-app-layout>
