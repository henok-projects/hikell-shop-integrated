@props(['disabled' => false, 'value'])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-3 py-2 rounded-md shadow-sm border-gray-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!} :class="{'text-black': dark}">{{ isset($value) ? $value : '' }}</textarea>
