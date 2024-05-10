<section class="bg-white p-6 rounded-lg shadow-md space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cancel Membership') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once you cancel your membership, your account will be deleted. All of its certificates will be permanently removed. Before deleting your account, please download any certificates you wish to retain.') }}
        </p>
    </header>

    <button 
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-danger text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once cancelled, your account is deleted, all of its data will be permanently removed. Please enter your password to confirm that you would like to permanently delete your account.') }}
            </p>

            <div>
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" name="password" type="password" class="form-control form-control-lg mt-1 block w-full" placeholder="{{ __('Password') }}" />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end items-center mt-4">
                <button type="button" x-on:click="$dispatch('close')" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">{{ __('Cancel') }}</button>

                <button type="submit" class="bg-danger text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline ml-3">{{ __('Delete Account') }}</button>
            </div>

        </form>
    </x-modal>
</section>
