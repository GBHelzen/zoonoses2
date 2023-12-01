<div>
    {{-- In work, do what you enjoy. --}}
    <div class="mt-5 pt-12 md:grid md:grid-cols-3 md:gap-4">
       
        <div class=" md:mt-0 md:col-span-3">
            <x-flash-messages></x-flash-messages>
            <form wire:submit.prevent="store" method="POST">
                @include('admin.dados-socio-economicos.partials._form-dados-socioeconomicos')
            </form>
        </div>
    </div>
</div>