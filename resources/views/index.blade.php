<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Onshop | Buy Everything Anytime and Anywhere</title>
        <!-- tailwindcss -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Ionicon -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
        <!-- Background Image -->
        @vite('resources/css/app.css')
        {{-- AlpineJS --}}
        <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <nav class="py-4 px-20 bg-white fixed top-0 w-full h-20 z-50 flex justify-between gap-16 border-b-2 text-lg"> 
        <div class="flex text-center content-center items-center mr-40">
            <div>
                LOGO
            </div>
        </div>
        <div class="absolute top-[1.20rem] left-[12rem]" x-data="{open: false}">
            <button @click="open = ! open" class="text-white bg-blue-600 hover:bg-700 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex
             items-center focus:ring-2 focus:outline-none focus:ring-blue-300">
                <span>Kategori</span>
                <ion-icon class="ml-2 h-4 w-4" name="chevron-down-outline"></ion-icon>
            </button>
            {{-- Dropdonw --}}
            <div x-show="open" @click.away="open = false" class="mt-2 z-10 bg-white divide-y divide-gray-100 rounded shadow w-30">
                <ul class="text-sm px-1 py-1 text-gray-700">
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100" href="">Kategori 1</a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 hover:bg-gray-100" href="">Kategori 2</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex text-center items-center content-center w-full border-solid border-2 border-blue-100 rounded-lg">
            <ion-icon name="search-outline" class="px-4"></ion-icon>
            <input type="text" placeholder="Search.." class="w-full h-full py-1 px-1 border-transparent">
        </div>
        <div class="flex gap-5 items-center content-center text-lg">
            <a href="{{Route('cart.list')}}" class="w-8 h-8 mr-8"><ion-icon class="h-full w-full" name="cart-outline"></ion-icon></a>
            @if (!Auth::check())
                <a href="#"class="ring-1 ring-blue-500 ring-offset-4 rounded-sm py-1 px-2 text-blue-500">Masuk</a>
                <a href="{{Route('reg')}}" class="bg-blue-500 text-white rounded-sm py-2 px-4 ">Daftar</a>
            @endif
        </div>
    </nav>

    <main class="mt-24">
        <div class="max-w-6xl mx-auto relative overflow-hidden shadow-lg bg-white shadow-lg" x-data="{
            activeSlide:1,
            slides: [
                {id: 1, title: 'Helo 1', image: 'bg.jpeg'},
                {id: 2, title: 'Helo 2', image: 'console.jpg'},
                {id: 3, title: 'Helo 3', body: 'ini bukan tas'},
                {id: 4, title: 'Helo 4', body: 'ini bukan XBOX'},
                {id: 5, title: 'Helo 5', body: 'ini bukan TV'},
            ],
            loop(){
                setInterval(() => {this.activeSlide = this.activeSlide === 5 ? 1 : this.activeSlide + 1}, 4000)
            }
        }"
        x-init="loop"
        >
            {{-- Data Loop --}}
            <template x-for="slide in slides" :key="slide.id">
                <div x-show="activeSlide === slide.id" class="w-full h-[25rem] flex items-center bg-slate-500 text-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="h-full w-full">
                        <img class="object-cover h-full w-full" :src="'gambar/' + slide.image">
                    </div>
                </div>
            </template>

            {{-- Back/Next --}}
            <div class="absolute inset-0 flex overflow-hidden">
                <div class="flex items-center justify-start w-1/2">
                    <button
                    x-on:click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
                    class="bg-transparent text-slate-600 font-bold rounded-full w-12 h-12 flex justify-center items-center hover:text-white"><ion-icon name="arrow-back-outline" ></ion-icon></button>
                </div>
                <div class="flex items-center justify-end w-1/2">
                    <button 
                    x-on:click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
                    class="bg-transparent text-slate-600 font-bold rounded-full w-12 h-12 flex justify-center items-center hover:text-white"><ion-icon name="arrow-forward-outline"></ion-icon></button>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto h-96 mt-8">
            <span class="font-semibold text-2xl pl-4">Khusus Kamu Pengguna Baru</span>
            <div class="flex w-full mt-4 p-4 gap-4">
                @foreach ($products as $pd)
                <div class="w-58 rounded-lg flex flex-col items-center border-solid border-2 shadow-lg">
                    <div class="w-[10rem] h-[10rem] overflow-hidden justify-center flex rounded-t-lg">
                        <img class="object-cover h-auto w-full" src="{{url($pd->image)}}" alt="">
                    </div>
                    <div class="w-full px-2 py-2">
                        <h3 class="text-gray-700 uppercase">{{ $pd->product_name }}</h3>
                        <span class="mt-2 text-black">${{ $pd->prices }}</span>
                        <form action="{{Route('cart.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $pd->id }}" name="id">
                            <input type="hidden" value="{{ $pd->product_name }}" name="name">
                            <input type="hidden" value="{{ $pd->prices }}" name="price">
                            <input type="hidden" value="{{ $pd->image }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html> 