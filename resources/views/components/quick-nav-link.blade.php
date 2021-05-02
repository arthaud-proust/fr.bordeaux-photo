@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center justify-center m-1 p-3 rounded-md text-base font-medium text-p1 bg-s3 focus:outline-none focus:text-t1 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center justify-center m-1 p-3 rounded-md text-base font-medium text-p2 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
