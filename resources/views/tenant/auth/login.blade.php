<x-guest-layout>
    <x-auth-card>
        <div>
            <h1 class="text-center mx-2 text-gray-100">
                Banco {{ strtoupper(tenant('id')) }}
            </h1>
        </div>
        <x-slot name="logo">
            <a href="/{{tenant('id')}}/login">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-300" /> --}}
                {{-- <div class=" rounded-md w-20 h-20 fill-current text-gray-300" style="background-image:url('https://img.freepik.com/vector-premium/ilustracion-gato-colorido-estilo-pop-art_373096-980.jpg'); background-repeat: no-repeat; background-size: cover;"></div> --}}
                <div class=" rounded-md w-20 h-20 fill-current text-gray-300" style="background-image:url({{tenant('logo')}}); background-repeat: no-repeat; background-size: cover;"></div>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form id="formulario" method="POST" action="{{ route('tenant.login', tenant('id')) }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-200"/>

                <x-text-input id="email" class="block mt-1 w-full bg-gray-200" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-200"/>

                <x-text-input id="password" class="block mt-1 w-full bg-gray-200"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center ">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-gray-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-100">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('tenant.password.request'))
                    <a class="underline text-sm text-gray-200 hover:text-gray-900" href="{{ route('tenant.password.request', tenant('id')) }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3 bg-gray-600 hover:bg-gray-700">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
            
        </form>
        
        <form action="post" id="hola">
            
        </form>

    </x-auth-card>
    
    <script>
        let dateTime = new Date()
        const fecha = `${dateTime.getFullYear()}-${(dateTime.getMonth() + 1)}-${dateTime.getDate()}`
        dateTime = fecha + ` ${dateTime.getHours()}:${dateTime.getMinutes()}:${dateTime.getSeconds()}`
                    
        let formularios = document.forms
        for (let index = 0; index < formularios.length; index++) {
            let newInput = document.createElement("input")
            newInput.type = 'hidden'
            newInput.name = 'fecha_cliente'
            newInput.value = dateTime
            const form = formularios[index];
            form.appendChild(newInput);
        }
        // const formulario = document.getElementById('formulario')
        // formulario.appendChild(newInput)
    </script>
    
</x-guest-layout>
