<?php

use function Livewire\Volt\{state, with};

with(['stories' => fn () => \App\Models\Story::with(['storyItems'])->has('storyItems')->latest()->get()]);

?>

<x-container
    className="flex items-center gap-x-4 px-4 mt-3 py-3 -mx-3 overflow-y-auto whitespace-no-wrap scroll-hidden">
    @foreach ($stories as $story)
    <div class="flex flex-col items-center w-20 gap-1 p-2 shrink-0" wire:key="{{$story->id}}">
        <a href="{{ route('stories', ['story' => $story]) }}" wire:navigate
            class="inline-flex items-center justify-center rounded-full p-0.5 bg-gradient-to-r from-yellow-400 via-pink-500 to-red-500">
            <div class="w-14 h-14 rounded-full border-2 border-white">
                <img src="{{$story->preview_image_url}}" alt="story_preview_image"
                    class="w-full h-full object-cover rounded-full">
            </div>
        </a>
        <p class="text-sm font-medium truncate text-center w-full">{{ fake()->name }}</p>
    </div>

    @endforeach
</x-container>