@props(['value','tooltip'])
<div class="inline-flex">
	<label {{ $attributes->merge(['class' => 'block font-medium text-sm']) }} :class="{'text-gray-700': !dark, 'text-gray-200': dark}">
        {{ $value ?? $slot }}
    </label>
    @isset($tooltip)
        <x-help-tooltip :tooltip="$tooltip"/>
    @endisset
</div>
