@if (session()->has('success'))
{{-- <div class="max-w-7xl mx-auto pt-4  px-4 sm:px-6 lg:px-8"> --}}
    <div class="py-4 p-3 mb-4 bg-green-300 text-white rounded shadow-sm">
        {{ session('success') }}
    </div>
{{-- </div> --}}

@endif


@if (session()->has('error'))
{{-- <div class="max-w-7xl mx-auto pt-4  px-4 sm:px-6 lg:px-8"> --}}
    <div class="py-4 p-3 mb-4 bg-red-300 text-white rounded shadow-sm">
        {{ session('error') }}
    </div>
{{-- </div> --}}

@endif



@if ($errors->any())
{{-- <div class="max-w-7xl mx-auto pt-4  px-4 sm:px-6 lg:px-8"> --}}
    <div class="py-4 p-3 mb-4 bg-red-300 text-white rounded shadow-sm">
        {{ __('Verifique os erros !') }}
    </div>
{{-- </div> --}}

@endif