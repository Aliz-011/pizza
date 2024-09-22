<?php

use function Livewire\Volt\{state, mount};
use function Livewire\Volt\layout;

use App\Models\Product;
use App\Models\Cart;

layout('layouts.app');

state([
    'product',
    'quantity',
    'product_item_id'
]);

mount(function ($id) {
    $data = Product::where('id', '=', $id)->with(['productItems', 'ingredients'])->first();
    $this->product = $data;
});

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

$handleSubmit = function () {
    $existingCart = auth()->user()->cart()->first();
    if ($existingCart) {
        $existingCart->cartItems()->create([
            'product_item_id' => $this->product_item_id,
            'quantity' => $this->quantity
        ]);
        return;
    }

    $data = auth()->user()->cart()->create([
        'token' => generateRandomString()
    ]);

    $data->cartItems()->create([
        'product_item_id' => $this->product_item_id,
        'quantity' => $this->quantity
    ]);
}

?>

<x-container className="my-10 pb-5 md:pb-0">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img alt="{{$product->name}}" class="lg:w-1/2 size-full object-cover object-center rounded"
            src="{{$product->image_url}}" />

        <form wire:submit="handleSubmit" class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
            <div class="flex items-center justify-between">
                <h1 class="text-gray-900 text-2xl font-semibold mb-1">{{$product->name}}</h1>
                <span class="text-2xl font-bold">${{$product->productItems[0]->price}}</span>
            </div>

            {{-- STARs --}}
            <div class="flex mb-4">
                <div class="flex items-center">
                    <x-lucide-star class="w-4 h-4 text-red-500 fill-current" />
                    <x-lucide-star class="w-4 h-4 text-red-500 fill-current" />
                    <x-lucide-star class="w-4 h-4 text-red-500 fill-current" />
                    <x-lucide-star class="w-4 h-4 text-red-500 fill-current" />
                    <x-lucide-star class="w-4 h-4 text-red-500 fill-none" />
                    <span class="text-gray-600 ml-3">4 Reviews</span>
                </div>
            </div>

            <div class="my-10 space-y-2">
                <h3 class="text-sm font-bold text-gray-900">Qty</h3>
                <input type="number" wire:model="quantity"
                    class="flex h-10 w-full sm:w-auto rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
            </div>

            <h2 class="text-sm title-font text-gray-500 tracking-widest">INGREDIENTS</h2>
            @foreach ($product->ingredients as $ingredient)
            <p class="leading-relaxed" wire:key="{{$ingredient->id}}">{{$ingredient->name}}</p>
            @endforeach

            {{-- SIZEs --}}
            <div class="mt-10">
                <h3 class="text-sm font-bold text-gray-900">Size & Pizza type</h3>
                <fieldset aria-label="Choose a size" class="mt-4">
                    <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                        @foreach ($product->productItems as $item)
                        {{-- {{dd($item)}} --}}
                        <label
                            class="group relative flex flex-col cursor-pointer items-center justify-center rounded-md border bg-white py-2 text-sm font-medium text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none sm:flex-1">
                            <input type="radio" wire:model="product_item_id" value="{{$item->id}}" class="sr-only">
                            <span class="uppercase">{{ $item->size }}</span>
                            <span class="font-bold capitalize">{{ $item->pizza_type }}</span>
                            <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                        </label>
                        @endforeach
                    </div>
                </fieldset>
            </div>

            <x-primary-button className="mt-10 flex w-full items-center justify-center">Add
                to cart</x-primary-button>
        </form>
    </div>
</x-container>