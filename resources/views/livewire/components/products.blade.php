<?php

use function Livewire\Volt\{state, computed};

state([
    'search',
])->url(as: 'q');

$categories = 
    computed(fn () => 
        \App\Models\Category::with(['products', 'products.ingredients', 'products.productItems'])
            ->when($this->search, function($query){
                $query->where('name', 'like', '%'.$this->search.'%');
            })
            ->latest()
            ->get()
    );

?>

<div class="flex-1">
    <div class="flex flex-col gap-16">
        @foreach ($this->categories as $category)
        <div wire:key="{{ $category->id }}">
            <h3 class="text-lg font-bold mb-5 capitalize">{{ $category->name}}</h3>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach ($category->products as $product)
                <x-product-card :name="$product->name" :price="optional($product->productItems->first())->price"
                    :image="$product->image_url" :id="$product->id" wire:key="{{ $product->id }}" />
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>