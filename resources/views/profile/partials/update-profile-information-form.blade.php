<section class="p-6 bg-green-500 dark:bg-green-900 rounded-lg shadow-md">
    <header>
        <h2 class="text-lg font-medium text-green-800 dark:text-green-300">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-green-600 dark:text-green-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-green-800 dark:text-green-300" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 dark:bg-green-800 dark:border-green-700 dark:focus:border-green-500 dark:focus:ring-green-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-green-600 dark:text-green-400" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-green-800 dark:text-green-300" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full border-green-300 focus:border-green-500 focus:ring-green-500 dark:bg-green-800 dark:border-green-700 dark:focus:border-green-500 dark:focus:ring-green-500" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-green-600 dark:text-green-400" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 dark:bg-green-700 dark:hover:bg-green-600">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 dark:text-green-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
