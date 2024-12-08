@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black dark:text-gray-400']) }}>
    {{ $value ?? $slot }}
</label>
