<div>
    {{-- Do your work, then step back. --}}




    <div class="flex flex-col ">
        {{-- <x-flash-messages></x-flash-messages> --}}
        <div class="overflow-x-auto  ">

            <div
                class="hidden md:block   align-middle py-12 min-w-full ">
                @include('pessoas.servicos.partials.index')
            </div>

            @include('pessoas.servicos.partials.index-mobile')
        </div>
    </div>



</div>
