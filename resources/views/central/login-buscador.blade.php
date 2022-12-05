<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form action="{{ route('login-buscador') }}" method="POST">
            @csrf

            <!-- Identificador Empresa -->
            <div>
                <x-input-label for="id" :value="__('Identificador Empresa')" />

                <x-text-input id="id" class="block mt-1 w-full" type="text" name="id" :value="old('id')" required autofocus />

                <x-input-error :messages="$errors->get('id')" class="mt-2" />
                <!-- Mensaje De Error -->
                @if (session('error'))
                <div class="mt-4">
                    <div class="font-medium text-red-600">{{ session('error') }}</div>
                </div>
                @endif
            </div>

            <div class="flex items-center justify-end mt-3">
                <!-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif -->
                <!-- Href Login -->
                <a class="ml-3" href="{{ route('login') }}">
                    {{ __('Ingresar Como Administador') }}
                </a>

                <x-primary-button class="ml-3">
                    {{ __('Buscar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>