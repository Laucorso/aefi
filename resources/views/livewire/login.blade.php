<div>
        <!-- <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form> -->
    @if ($error!='')
        <div class="flex justify-center items-center">
            <x-label for="email" class="text-red-600" value="{{ $error}}" />
            <i class="fa-solid fa-circle-exclamation ml-2 text-red-600 text-xl"></i>
        </div>
    @endif
    <div>
        <x-label for="user_asociado" value="{{ __('Numero Asociado') }}" />
        <x-input id="user_asociado" wire:model.lazy='num_asoc' class="block mt-1 w-full" type="text" name="user_asociado"  autofocus />
    </div>

    <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input wire:keydown.enter="login" id="password" wire:model.lazy='password' class="block mt-1 w-full" type="password" name="password"  autocomplete="current-password" />
    </div>

    <div class="flex items-center justify-end mt-4">
        {{-- @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif --}}
    </div>
    <button wire:click="login" type="button" class="btn btn-dark" style="float: right;">Login</button>
</div>