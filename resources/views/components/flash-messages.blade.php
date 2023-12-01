@if (session()->has('message'))
<div id="alert"
    class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full  bg-green-200 shadow rounded">
    {{ session('message') }}
    <svg onclick="document.getElementById('alert').remove();" class="fill-current" xmlns="http://www.w3.org/2000/svg"
        width="18" height="18" viewBox="0 0 18 18">
        <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
        </path>
    </svg>
</div>
@endif

@if (session()->has('success'))
<div id="alert"
    class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full  bg-green-200 shadow rounded">
    {{ session('success') }}
    <svg onclick="document.getElementById('alert').remove();" class="fill-current" xmlns="http://www.w3.org/2000/svg"
        width="18" height="18" viewBox="0 0 18 18">
        <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
        </path>
    </svg>
</div>
@endif

@if (session()->has('error'))
<div id="alert"
    class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full  bg-red-200 shadow rounded">
    {{ session('error') }}
    <svg onclick="document.getElementById('alert').remove();" class="fill-current" xmlns="http://www.w3.org/2000/svg"
        width="18" height="18" viewBox="0 0 18 18">
        <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
        </path>
    </svg>
</div>
@endif


@if (session()->has('error-animal'))
<div id="alert"
    class="py-4 p-3 mb-4 close cursor-pointer flex items-center justify-between w-full  bg-red-200 shadow rounded">
    {{ session('error-animal') }}

    @if (Auth::user()->pessoa->ong == null)
    <div class="order-3 mt-2 flex-shrink-0  sm:order-2 sm:mt-0 sm:w-auto">
        <a href="{{ route('pessoas.show', Auth::user()) }}"
            class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-red-600 bg-white hover:bg-red-50">
            Preencher
        </a>
    </div>
    @else
    <div class="order-3 mt-2 flex-shrink-0  sm:order-2 sm:mt-0 sm:w-auto">
        <a href="{{ route('ongs.profile', Auth::user()->pessoa->ong) }}"
            class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-red-600 bg-white hover:bg-red-50">
            Preencher
        </a>
    </div>
    @endif



</div>
@endif