@if (Auth::user()->pessoa->animais->count() > 0)
<div class="bg-gray-50 mb-12 ">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
            <span class="block">Para emitir uma guia de castração de animal</span>
            <span class="block text-indigo-600">Clique no botão "solicitar castração".</span>
            @if(Auth::user()->pessoa->perfilCompleto())
                @if(Auth::user()->pessoa->naoEletivo())
                <span class="block text-lg mt-5 font-bold text-gray-900 sm:text-lg">Lembre-se, você pode cadastrar até 2 animais ! </span>
                @else
                <span class="block text-lg mt-5 font-bold text-gray-900 sm:text-lg">Lembre-se, você pode cadastrar até 4 animais ! </span>
                @endif
            @endif
        </h2>

        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Saiba mais
                </a>
            </div>
        </div>
    </div>
</div>
@else

<div class="bg-gray-50 mb-12 ">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-xl">
            <span class="block">Deseja solicitar uma guia de autorização de serviço ?</span>
            <span class="block text-indigo-600">Começe cadastrando um animal de estimação.</span>
        </h2>

        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a wire:click="openModal" href="#"
                    class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Cadastrar animal
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                    Saiba mais
                </a>
            </div>
        </div>
    </div>
</div>

@endif
