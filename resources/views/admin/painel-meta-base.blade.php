    {{-- In work, do what you enjoy. --}}
    <div>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Painel Metabase') }}
            </h2>
        </x-slot>


        <div class="">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <iframe wire:model="iframeUrl" src="" title="description"></iframe>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {

                let payload = {
                    resource: {
                        dashboard: 57
                    },
                    params: {},
                    exp: Math.round(Date.now() / 1000) + (10 * 60) // 10 minute expiration
                };


                let token = jwt.sign(payload, @this.$METABASE_SECRET_KEY);

                @this.iframeUrl = @this.$METABASE_SITE_URL + "/embed/dashboard/" + token + "#bordered=true&titled=true";
            })
        </script>

    @endpush
