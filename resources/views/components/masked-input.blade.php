@props(['disabled' => false, 'mask'])

<div
    x-data
    x-init="
         Inputmask('{{ $mask }}', {
            numericInput: false,
            showMaskOnHover: true,
            autoUnmask: false,
            onBeforeMask: function (value, opts) {
                let v = new String()
                if(null !== value && typeof value !== 'undefined' ){
                    v = value
                }
                return v;
            }
        }).mask($refs.input);
    "
>
    <input x-ref="input" x-on:change.prevent="$dispatch('input', (typeof $refs.input !== 'undefined' && $refs.input !== null) ? $refs.input.value:'')" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
</div>