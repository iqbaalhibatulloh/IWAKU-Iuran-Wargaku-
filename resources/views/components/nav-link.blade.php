@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex w-full text-white dark:text-white bg-[#3C2A21] p-1 rounded-md '
            : 'text-white dark:text-white flex p-1';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
