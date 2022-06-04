@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAApCAYAAABHomvIAAAACXBIWXMAAAsSAAALEgHS3X78AAACu0lEQVRYhe2Yv46bMBzHf0E3tTXN1unUSJVO6RS6sJYXQNwbNH0D9wnCPcHRpetx061FeYBeVia6oVaVOHXqRvDNSWVqOIsYMGByVdWPhBTAdr787N8fe7Lf76ELGSFTADA6dXog0RFKunToJDAjBAOACwDPewqkXAMA1hFKlQpk4i4HCOPZ6AhZqgWmAy1X5Y2OUNTWSJMUZykWR5nKNJIS+JicDPlvHaGJTLuMkG6hguOvt+C/PcUduBC0lQrYpcCWDCGVOQIvNGq881bwbMYuEamDzTwE5XEwI2QJAF7XUFJ1ksALqZC3XcZo4NrB5vIkI+QcAK4UDaqSd4EXRhqzXB+2RxC5pAJf9uz8WbEYEYs6L960dKQeSIuHKq25tYWD9TvZZtlBlJfNEDLM17syOsS2JvLmksALD7QcIw5ScV/Y784f3ipQsoIu4h+1UFQUo/P1zuVjHbtPYlvzlQmsWKCNFfuo9zpCfnHPsWLr29//fJV/9OT0R+O6HWuKrzJCEoCnG2bZBXu+4RypWI+NdeGYxYIV25rFezu79+frncGe4/sXZwa96gY5hpMkzHLFJonGz+nr6PsstrUU4Cxl74R5WUZgUlON8Fh1OTi2tYS9L6Cp1VidmrObCMAGWDZVNq0C2T7WbWqTEeLKFgmxrdE1GN1Ef0Q9+/WtrqKREzgi5zJDCwUO2UPUEXghZh6bT/cT+JS3DG7D7gJHEOcKYqIU2ohlE593paZTwN2QerCJrzpCvMBFU+MGPE1HiJr/o0Jxd5Ww0gc6qxcONr3ybGbgsVpJxXI5NXsVesrlVzZPNGBHDjbLMUonYRWIsF4LvFAonh+oB5FMf1kvrqtohhS2UtX3/6OPoQwK1KI9hGoe04Jqz6gVW2vrYFP5CavKYN5YvvFIC3SwSauRoSJplvlAM4RUawD4DWVK5FboMgTIAAAAAElFTkSuQmCC">
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
