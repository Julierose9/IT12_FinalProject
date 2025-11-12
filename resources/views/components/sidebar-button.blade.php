@props(['href' => '#', 'type' => 'link'])

@if($type === 'submit')
    <button {{ $attributes->merge(['class' => 'block w-full text-left px-3 py-2 hover:bg-blue-700 rounded']) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'block px-3 py-2 hover:bg-blue-700 rounded']) }}>
        {{ $slot }}
    </a>
@endif
