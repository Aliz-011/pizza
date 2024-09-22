<a href="{{route('product.details', ['id' => $id])}}" wire:navigate class="w-full flex flex-col gap-2 group relative">
    <div
        class="aspect-h-1 aspect-w-1 flex justify-center p-6 bg-secondary rounded-lg lg:aspect-none h-80 group-hover:opacity-75">
        <img src="{{$image}}" alt="{{$name}}" class="size-full" />
    </div>

    <span class="mb-1 font-bold">{{ $name }}</span>

    <div class="flex justify-between items-center mt-2">
        <span class="text-[20px] font-bold">
            ${{ $price }}
        </span>

        <button
            class="flex items-center justify-center whitespace-nowrap rounded-md ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-base font-bold bg-secondary text-primary hover:bg-secondary/80 h-9 px-3">
            <x-lucide-plus class="mr-1 size-4" />
            Add
        </button>
    </div>
</a>