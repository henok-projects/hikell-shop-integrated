@props(['type', 'message'])

@php
    if (isset($type) && $type == "error")
    {
        $color = "red-600";
    } else {
        $color = "green-600";
    }
@endphp

<div {{ $attributes }}>
    <div class="list-disc flex items-center list-inside text-sm text-<?=$color?>">
        <i class="fa fa-check mr-1"></i>
        {{ $message }}
    </div>
</div>
