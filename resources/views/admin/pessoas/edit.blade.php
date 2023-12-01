<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar - '.$user->name ) }}
        </h2>
    </x-slot>

<div>

<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('pessoas.update-password', $user->id) }}">
            @csrf

        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 block">
                <x-label class="inline-flex font-bold  text-lg" for="nome" :value="__('Dados do usuário')" />

            </div>

            <div class="col-span-12 sm:col-span-4">
                <!-- Email -->
                <div class="mt-4">
                    <div class="inline-flex">
                        <x-label for="email" :value="__('Email')" /> <span class=" ml-1 text-sm text-red-700">*</span>

                    </div>

                    <x-input wire:model="user.email" id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="$user->email" />
                    @error('user.email') <span class="text-red-700">{{ $message }}</span> @enderror
                </div>


            </div>

            <div class="col-span-12 sm:col-span-3">
            <!-- Password -->
            <div class="mt-4">
                <div class="inline-flex">
                <x-label wire.model="user.password" for="password" :value="__('Nova senha')" /> <span class=" ml-1 text-sm text-red-700">*</span>
                </div>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
            </div>

            <div class="col-span-12 sm:col-span-3">
            <!-- Confirm Password -->
            <div class="mt-4">
                <div class="inline-flex">
                <x-label for="password_confirmation" :value="__('Confirmar nova senha')" /> <span class=" ml-1 text-sm text-red-700">*</span>
                </div>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>
            </div>

            @if (session()->has('error'))
            <div class="col-span-12">
                <div id="alert"
                    class="py-4 mb-4 close cursor-pointer flex items-center justify-between w-full p-2 bg-red-200 shadow rounded">
                    {{ session('error') }}
                    <svg onclick="document.getElementById('alert').remove();" class="fill-current"
                        xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            @endif

        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 float-left">
        <a href="{{ url()->previous() }}" type="button"
            class="py-auto mr-4 inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Voltar
        </a>

        <x-button class="py-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Atualizar') }}
        </x-button>
    </div>
</form>
</div>
</div>
</x-admin-layout>
