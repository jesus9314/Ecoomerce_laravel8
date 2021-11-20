<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col max-w-md p-6 rounded-md sm:p-10 dark:bg-coolGray-900 dark:text-coolGray-100">
                <div class="mb-8 text-center">
                    <h1 class="my-3 text-4xl font-bold">Iniciar Sesión</h1>
                    <p class="text-sm dark:text-coolGray-400">Inicia sesión para ingresar a tu cuenta</p>
                </div>
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block mb-2 text-sm">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" placeholder="direccion@correo.com" name="email" :value="old('email')" required autofocus class="w-full px-3 py-2 border rounded-md dark:border-coolGray-700 dark:bg-coolGray-900 dark:text-coolGray-100">
                        </div>
                        <div>
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-sm">{{ __('Password') }}</label>
                                <a href="#" class="text-xs hover:underline dark:text-coolGray-400">{{ __('Forgot your password?') }}</a>
                            </div>
                            <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="*****" class="w-full px-3 py-2 border rounded-md dark:border-coolGray-700 dark:bg-coolGray-900 dark:text-coolGray-100">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <button type="submit" class="w-full px-8 py-3 rounded-md dark:bg-violet-400 dark:text-coolGray-900">{{ __('login') }}</button>
                        </div>
                        <p class="px-6 text-sm text-center dark:text-coolGray-400">Don't have an account yet?
                            <a href="#" class="hover:underline dark:text-violet-400">Sign up</a>.
                        </p>
                    </div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
