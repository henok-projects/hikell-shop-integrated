@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-3 py-2 rounded-md shadow-sm border-gray-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ']) !!}
:class="{'text-gray-700': !dark, 'text-black': dark}">
