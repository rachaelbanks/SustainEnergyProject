<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Card Details') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="row">
                    <div class="col-sm-12 col-md-8 mx-auto">
                        <div class="p-4 p-lg-8 bg-white shadow-sm rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-card-details')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
