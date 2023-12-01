<div>


    @include('ong.animais.notificacao')

    <div class="mb-12 flex flex-col  lg:mx-0">
        <x-flash-messages></x-flash-messages>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            @if($destroyAnimal)

            @include('ong.animais.destroy')

            @endif

            <div
                class="invisible md:visible lg:visible xl:visible py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                @include('ong.animais.partials.index')

            </div>
            @include('ong.animais.partials.index-mobile')
        </div>


    </div>

</div>