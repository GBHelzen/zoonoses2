<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionando permissões') }}
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
                <x-label class="inline-flex font-bold  text-lg" for="nome" :value="__('Dados do usuário - '.$user->name )" />

            </div>

            @can('isAdmin|isSuperAdmin')
                <div class="">

                    <x-label class="font-bold w-80" for="tipo_usuario" :value="__('Tipo de suário')" />
                    <div class="flex items-stretch w-96">
                    @foreach ($papeis as $item)
                    <div class="py-4 pl-6">
                        <label class="form-check-label">{{ $item->name }}</label>
                        <input class="block mt-1 w-5" type="checkbox" name="tipo_usuario[]"
                        value="{{ $item->id }}" />
                    </div>
                    @endforeach
                    </div>

                    @error('tipo_usuario') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                @endcan

        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 sm:px-6 float-left w-full">
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
