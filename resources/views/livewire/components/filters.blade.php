<?php

use function Livewire\Volt\{state, computed};
use App\Models\Ingredient;

state([
    'dimension',
    'ingreds'
])->url();

state([
    'sizes' => [
        ['label' => '20 cm', 'value' => '20'],
        ['label' => '30 cm', 'value' => '30'],
        ['label' => '40 cm', 'value' => '40'],
    ],
    'limit' => 6,
    'showAll' => false
]);

$ingredients = computed(fn () => ($this->showAll) ? Ingredient::all() : Ingredient::take($this->limit)->get());

$handleClick = fn () => $this->showAll = !$this->showAll;

?>

<div class="w-[250px] hidden md:flex md:flex-col gap-5">
    <h4 class="font-bold text-xl">Filter</h4>

    <div className="flex flex-col gap-4 max-h-96 overflow-auto scrollbar">
        <div class="flex items-center space-x-3">
            <input id="traditional" name="color[]" value="traditional" type="checkbox"
                class="size-5 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">
            <label for="traditional" class="leading-none flex-1 text-gray-600">Traditional</label>
        </div>
    </div>

    <div class="border-y border-y-neutral-100 mt-5">
        <p class="font-bold text-lg mb-3">Price from and to:</p>

        <div class="flex gap-3">
            <input type="number"
                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                min="0" max="1000" placeholder="0">

            <input type="number"
                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                min="100" max="1000" placeholder="1000">
        </div>
    </div>

    {{-- Filter size --}}
    <div class="mt-5">
        <p class="font-bold text-lg mb-3">Dimensions</p>

        <div class="flex flex-col gap-4 max-h-96">
            @foreach ($sizes as $size)
            <div class="flex items-center space-x-3" wire:key="{{$size['value']}}">
                <input id="{{ $size['value'] }}" name="dimension[]" type="checkbox"
                    class="size-5 rounded border-gray-300 text-primary focus:ring-primary focus:ring-2 cursor-pointer">
                <label for="{{ $size['value'] }}" class="leading-none flex-1 text-gray-600">{{$size['label']}}</label>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Filter ingredients --}}
    <div class="mt-5" x-data="{showAll: false}">
        <p class="font-bold text-lg mb-3">Ingredients</p>

        <div class="flex flex-col gap-4 max-h-96 overflow-auto scrollbar">
            @foreach ($this->ingredients as $ingredient)
            <div class="flex items-center space-x-3" wire:key="{{$ingredient->id}}">
                <input id="{{ $ingredient->id }}" name="color[]" value="{{$ingredient->name}}" type="checkbox"
                    class="size-5 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">
                <label for="{{ $ingredient->id }}"
                    class="leading-none flex-1 text-gray-600">{{$ingredient->name}}</label>
            </div>
            @endforeach
        </div>


        <div>
            <button wire:click="handleClick" class="text-primary mt-3">
                {{$showAll ? 'Hide' : '+ Show All'}}
            </button>
        </div>

    </div>
</div>