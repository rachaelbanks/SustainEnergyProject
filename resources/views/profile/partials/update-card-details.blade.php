<section class="bg-white p-6 rounded-lg shadow-md space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Card Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your card details.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.card-details.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label class="form-label" for="card_number">Card Number</label>
            <input type="text" name="card_number" value="{{ old('card_number', $user->cardDetails->card_number ?? '') }}" class="form-control form-control-lg" required autofocus pattern="[0-9]{8}" minlength="8" maxlength="8" />
            <x-input-error class="mt-2" :messages="$errors->get('card_number')" />
        </div>
        
        <div>
            <label class="form-label" for="cvv">CVV</label>
            <input id="cvv" type="text" name="cvv" value="{{ old('cvv', $user->cardDetails->cvv ?? '') }}" class="form-control form-control-lg" required pattern="[0-9]{3}" minlength="3" maxlength="3" />
            <x-input-error class="mt-2" :messages="$errors->get('cvv')" />
        </div>

        <div>
            <label class="form-label" for="expiry_date">Expiry Date</label>
            <input id="expiry_date" type="date" name="expiry_date" value="{{ old('expiry_date', $user->cardDetails->expiry_date ?? '') }}" class="form-control form-control-lg" required />
            <x-input-error class="mt-2" :messages="$errors->get('expiry_date')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="custom-button">{{ __('Save') }}</button>

            @if (session('status') === 'card-details-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
