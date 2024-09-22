<x-app-layout>
    <x-container className="mt-4 md:mt-10">
        <h1 class="text-4xl font-bold">All pizzas</h1>
    </x-container>

    <livewire:components.categories />

    <livewire:components.stories />

    <x-container className="mt-10 pb-14">
        <div class="flex gap-[80px]">
            <livewire:components.filters />

            <livewire:components.products />
        </div>
    </x-container>
</x-app-layout>