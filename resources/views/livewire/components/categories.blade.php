<?php

use function Livewire\Volt\{computed, state, updated};

// Fetch all categories to show as filter pills
state([
    'categories' => fn () => \App\Models\Category::latest('name')->get()
])

// access the current active route
// url()->current()

?>

<div class='sticky top-0 bg-white py-5 shadow-lg shadow-black/5 z-10'>
    <x-container className="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="inline-flex gap-1 bg-gray-50 p-1 rounded-2xl">
            @foreach ($categories as $category)
            <x-primary-button variant="ghost" wire:key="{{ $category->id }}" wire:navigate
                href="{{ route('dashboard', ['q' => strtolower($category->name)]) }}"
                className="flex items-center h-11 rounded-4xl px-5 capitalize">
                {{ $category->name }}
            </x-primary-button>
            @endforeach
        </div>

        <div class="flex items-center gap-1 bg-gray-50 px-5 h-[52px] rounded-2xl cursor-pointer">
            <x-lucide-arrow-up-down class="size-4" />
            <span>Sort:</span>
            <span class="text-primary font-semibold">Popular</span>
        </div>
    </x-container>
</div>