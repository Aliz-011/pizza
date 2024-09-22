<?php

use function Livewire\Volt\{state, with, mount};
use App\Livewire\Actions\Logout;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Cart;

state([
    'cart',
    'subtotal'
]);

mount(function () {
    if (auth()->user()) {
        $this->cart = Cart::with(['cartItems'])->whereBelongsTo(auth()->user())->first();
        $this->subtotal = Cart::subtotal(auth()->user()->id);
    }
});

$removeItem = function ($id) {
    auth()->user()->cart()->cartItems()->destroy($id);
};

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<header class="border-b" x-data="{ open: false }">
    <p class="flex h-10 items-center justify-center bg-orange-500 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
        Get free delivery on orders over $100</p>

    <x-container className="flex items-center justify-between h-16">
        <a href="/" wire:navigate>
            <div class="flex items-center gap-4">
                <img src="/logo.png" alt="logo" height="35" width="25" />
                <div>
                    <h1 class="text-xl md:text-2xl uppercase font-black">PIZZA HUT</h1>
                    <p class="text-sm text-gray-400 leading-3">The One and Only</p>
                </div>
            </div>
        </a>

        <div class="flex items-center gap-3">
            @auth
            <button wire:click="logout"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-primary bg-background hover:bg-accent hover:text-primary h-9 px-3 text-primary">
                <x-lucide-user class="size-4 mr-2" />
                Logout
            </button>
            <button @click="open = true"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-primary bg-background hover:bg-accent hover:text-accent-foreground h-9 px-3">
                <x-lucide-shopping-cart class="size-4 text-primary" />
            </button>
            @endauth

            @guest
            <a href="{{route('login')}}" wire:navigate
                class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
            <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
            <a href="{{route('register')}}" wire:navigate
                class="text-sm font-medium text-gray-700 hover:text-gray-800">Create
                account</a>

            @endguest
        </div>
    </x-container>

    <div class="relative z-[60]" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-cloak
        x-show="open" style="display: none;">

        <!-- Background backdrop -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"
            x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md transform transition">
                        <!-- Slide-over panel -->
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl" x-show="open"
                            x-transition:enter="ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                {{-- CART HEADER --}}
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" @click="open = false"
                                            class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <x-lucide-x class="size-5" />
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                                            @if (isset($cart->cartItems) && $cart->cartItems->count())
                                            @foreach ($cart->cartItems as $item)
                                            <li class="flex py-6" wire:key="{{$item->id}}">
                                                <div
                                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="{{$item->productItem->product->image_url}}"
                                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                        class="h-full w-full object-cover object-center">
                                                </div>

                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div
                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">{{ $item->productItem->product->name }}</a>
                                                            </h3>
                                                            <p class="ml-4">${{ $item->productItem->price }}</p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500 capitalize">{{
                                                            $item->productItem->size }} - {{
                                                            $item->productItem->pizza_type }}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Qty {{ $item->quantity }}</p>

                                                        <div class="flex">
                                                            <button type="button" wire:click="removeItem({{$item->id}})"
                                                                class="font-medium text-orange-600 hover:text-orange-500">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>${{$subtotal[0]->total}}.00</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="{{route('checkout')}}" wire:navigate
                                        class="flex items-center justify-center rounded-md border border-transparent bg-orange-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-orange-600">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <button type="button" @click="$dispatch('close')"
                                            class="font-medium text-orange-500 hover:text-orange-600">
                                            Continue Shopping
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>