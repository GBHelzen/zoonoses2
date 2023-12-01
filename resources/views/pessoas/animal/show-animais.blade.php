<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    @include('pessoas.animal.notificacao')

    <div class="flex flex-col ">
        <x-flash-messages></x-flash-messages>
        <div class="-my-2 overflow-x-auto ">
          
            <div
                class="  hidden md:block  py-2 align-middle  min-w-full ">
                @include('pessoas.animal.partials.index')

            </div>
            @include('pessoas.animal.partials.index-mobile')
        </div>


    </div>


</div>