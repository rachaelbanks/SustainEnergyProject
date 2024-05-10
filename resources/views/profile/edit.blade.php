<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto">
                <div class="row">
                    <div class="col-sm-12 col-md-8 mx-auto">
                        <div class="p-4 p-lg-8 bg-white shadow-sm rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                        <div class="p-4 p-lg-8 bg-white shadow-sm rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                        <div class="p-4 p-lg-8 bg-white shadow-sm rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                        <div class="p-4 p-lg-8 bg-white shadow-sm rounded-lg">
                            <div class="max-w-xl">
                                <section class="bg-white p-6 rounded-lg shadow-md">
                                    <header>
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Edit Card Details') }}
                                        </h2>
                                
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __('Go here to edit card details') }}
                                        </p>
                                    </header>
                                    <a href="{{ route('profile.card-details.edit') }}" class="btn btn-primary">Edit Card Details</a>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
