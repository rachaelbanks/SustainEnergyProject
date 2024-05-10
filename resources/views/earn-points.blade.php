<x-app-layout>

    {{-- Heading --}}
    <div class="container-fluid py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h1 class="text-2xl md:text-3xl lg:text-5xl font-bold text-gray-700">
                    Earn <span class="text-success">Green</span> Points
                </h1>
                <p class="text-gray-500 text-lg mt-1">Rate your green activities and earn points.</p>
            </div>
        </div>
    </div>


    {{-- Earn Points Form --}}
    <div class="row justify-content-center">
        <div class="col-sm-10 d-flex justify-content-center">
            <div class="card" style="padding: 30px;  width: 100%; margin-bottom: 20px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);">
                <h2 class="h4 font-weight-medium text-dark">
                    {{ __('Enter Activities') }}
                </h2>
    
                <p class="mt-1 text-sm text-muted">
                    {{ __('Enter Your Rating for Your Activities. If you have not done an activity yet, leave it red.') }}
                </p>
    
                <form class="mt-6 row g-3" method="POST" action="{{ route('earn-points.store') }}">
                    @csrf

                    <!-- Displaying validation errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-md-6" style="padding-right: 30px;">
                        {{-- Activity 1 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="carbon-rating">Carbon Emission Rating</label>
                            <select class="form-control" id="carbon-rating" name="carbon-rating">
                                <option value="red" @if($point && $point->carbon_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->carbon_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->carbon_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 2 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="renewable-rating">Renewable Energy Rating</label>
                            <select class="form-control" id="renewable-rating" name="renewable-rating">
                                <option value="red" @if($point && $point->renewable_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->renewable_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->renewable_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 3 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="waste-rating">Waste Reduction Rating</label>
                            <select class="form-control" id="waste-rating" name="waste-rating">
                                <option value="red" @if($point && $point->waste_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->waste_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->waste_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 4 --}}
                        <div class="activity" style="padding-bottom: 30px;">
                            <label for="water-rating">Water Conservation Rating</label>
                            <select class="form-control" id="water-rating" name="water-rating">
                                <option value="red" @if($point && $point->water_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->water_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->water_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 5 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="supply-rating">Sustainable Supply Chain Rating</label>
                            <select class="form-control" id="supply-rating" name="supply-rating">
                                <option value="red" @if($point && $point->supply_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->supply_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->supply_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="col-md-6" style="padding-left: 20px;"">
                        {{-- Activity 6 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="biodiversity-rating">Sustainable Biodiversity Preservation Rating</label>
                            <select class="form-control" id="biodiversity-rating" name="biodiversity-rating">
                                <option value="red" @if($point && $point->biodiversity_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->biodiversity_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->biodiversity_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 7 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="energy-rating">Energy Efficiency Rating</label>
                            <select class="form-control" id="energy-rating" name="energy-rating">
                                <option value="red" @if($point && $point->energy_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->energy_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->energy_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 8 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="product-rating">Eco-friendly Products Rating</label>
                            <select class="form-control" id="product-rating" name="product-rating">
                                <option value="red" @if($point && $point->product_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->product_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->product_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 9 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="transportation-rating">Transportation Rating</label>
                            <select class="form-control" id="transportation-rating" name="transportation-rating">
                                <option value="red" @if($point && $point->transportation_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->transportation_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->transportation_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
    
                        {{-- Activity 10 --}}
                        <div class="activity" style="padding-bottom: 20px;">
                            <label for="packaging-rating">Sustainable Packaging Rating</label>
                            <select class="form-control" id="packaging-rating" name="packaging-rating">
                                <option value="red" @if($point && $point->packaging_points === 'red') selected @endif>Red</option>
                                <option value="orange" @if($point && $point->packaging_points === 'orange') selected @endif>Orange</option>
                                <option value="green" @if($point && $point->packaging_points === 'green') selected @endif>Green</option>
                            </select>
                        </div>
                    </div>
    
                    {{-- Submit Button --}}
                    <div class="col-md-12">
                        <button type="submit"
                            class="custom-button">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </form>

                <p class="mt-1 text-sm text-muted" style="padding-top: 20px;"">
                    {{ __('Haven\'t completed enough activities and need more points?') }}
                    <a href="{{ url('/vouchers') }}">{{ __('Buy Points Here!') }}</a>
                </p>
            </div>
        </div>
    </div>
    



    {{-- STRUGGLING TO EARN ENOUGH POINTS? PURCHASE VOUCHER HERE --}}
</x-app-layout>