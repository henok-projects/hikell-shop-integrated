@props(['errors'])
@php
    $curRoute = Route::currentRouteName();
@endphp
@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="list-disc list-inside {{ $curRoute === "site.launch" ? 'text-xl' : 'text-sm' }} text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
