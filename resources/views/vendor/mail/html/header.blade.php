<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Zoonoses')
{{-- <img src="{{asset('/img/logos/logo_zoonoses.png')}}" class="logo" alt="Zoonoses"> --}}
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
