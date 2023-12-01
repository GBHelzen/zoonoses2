<div>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <flash-messages></flash-messages>

            <form>

                {{-- Tipo_pessoa --}}
                <div>

                    <x-label for="tipo_pessoa" :value="__('Tipo Pessoa')" />

                    <select wire:model="tipo_pessoa" id="tipo_pessoa" name="tipo_pessoa" autocomplete="tipo_pessoa"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1">Pessoa Física</option>
                        <option value="0">Pessoa Jurídica</option>
                    </select>

                    @error('tipo_pessoa') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <x-label for="name" :value="__('Nome do responsável')" />

                    <x-input id="name" wire:model="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus />
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" wire:model="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" />
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- CPF -->
                <div class="mt-4">
                    @if ($this->tipo_pessoa == 0)
                        <x-label for="cpf" :value="__('CPF DO RESPONSÁVEL PELA ONG')" />
                    @else
                        <x-label for="cpf" :value="__('CPF')" />
                    @endif

                    <x-masked-input id="cpf" wire:model="cpf" :mask="'999.999.999-99'" class="block mt-1 w-full"
                        type="text" name="cpf" :value="old('cpf')" />
                    @error('cpf') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>


                @if ($this->tipo_pessoa == 0)


                    <!-- RAZAO SOCIAL -->
                    <div class="mt-4">
                        <x-label for="razao_social" :value="__('Razão Social')" />

                        <x-input id="razao_social" wire:model="razao_social" class="block mt-1 w-full" type="text"
                            name="razao_social" :value="old('razao_social')" autofocus />
                        @error('razao_social') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- CNPJ -->
                    <div class="mt-4">
                        <x-label for="cnpj" :value="__('CNPJ da ONG')" />
                        <x-masked-input id="cnpj" wire:model="cnpj" :mask="'99.999.999/9999-99'"
                            class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" />
                        @error('cnpj') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                @endif


                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Senha')" />

                    <x-input id="password" wire:model="password" class="block mt-1 w-full" type="password"
                        name="password" autocomplete="new-password" />
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirme a Senha')" />

                    <x-input id="password_confirmation" wire:model="password_confirmation" class="block mt-1 w-full"
                        type="password" name="password_confirmation" />
                </div>




                {{-- <div class="mt-4">

                    <div class="block mt-1 w-full">

                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                        @error('g_recaptcha_response') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>


                </div> --}}


                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Já possui cadastro?') }}
                    </a>

                    <x-button wire:click.prevent="store()" class="ml-4">
                        {{ __('Cadastrar') }}
                    </x-button>
                    {{-- <x-button type="submit" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}" data-callback='handle'
                        data-action='submit' class="g-recaptcha ml-4">
                        {{ __('Cadastrar') }}
                    </x-button> --}}
                    {{-- <x-button class="g-recaptcha ml-4" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"
                        data-callback='onSubmit' data-action='submit'>
                        {{ __('Cadastrar') }}
                    </x-button> --}}
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</div>


@push('scripts')

    {{-- <script src="https://www.google.com/recaptcha/api.js?render={{ env('CAPTCHA_SITE_KEY') }}"></script> --}}
    {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}

    <script>
        // function handle(e) {
        //     grecaptcha.ready(function() {
        //         grecaptcha.execute('{{ env('CAPTCHA_SITE_KEY') }}', {
        //                 action: 'submit'
        //             })
        //             .then(function(token) {
        //                 @this.set('captcha', token);
        //             });
        //     })
        // }

        // function onSubmit(token) {
        //     alert(token)
        //     document.getElementById("form").submit();
        // }

    </script>


@endpush
