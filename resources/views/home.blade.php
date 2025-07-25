<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Beranda</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rancho&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  @if (session('message'))
    <script>alert("{{ session('message') }}")</script>
  @endif
  <x-shop-layout>
    <div class="my-5 flex w-screen flex-col items-center gap-5">

      {{-- Banner --}}
      <div class="w-4xl h-85 overflow-hidden rounded-lg bg-white">
        <div
          class="group relative flex h-full w-full items-center overflow-hidden">
          <div
            class="font-poppins absolute inset-0 z-10 flex items-end bg-gradient-to-b from-[rgba(102,102,102,0.5)] to-black p-5 text-xl italic text-white transition duration-300 opacity-40">
            <span>Welcome!</span>
          </div>
          <img class="transition-all hover:opacity-30"
            src="{{ asset('images/banner/Serba ada untuk elo.png') }}">
        </div>
      </div>

      {{-- Categories --}}
      <div
        class="w-4xl h-67 font-poppins overflow-x-scroll rounded-lg bg-white p-5 font-light shadow-[0_3px_3px_rgba(70,70,70,0.5)]">
        <h2 class="font-poppins mb-3 text-xl font-semibold">Kategori Pilihan
        </h2>
        
        <div class="flex h-[80%] w-full flex-row gap-3">
          @foreach ($categories as $category)
            <a class="block w-fit" href="">
              <div
                class="w-35 h-full rounded-lg p-1 hover:bg-gray-100 shadow-[4px_4px_7px_#dadada] transition-all active:translate-x-[4px] active:translate-y-[4px] active:shadow-none">
                <img class="w-full" src="{{ asset($category['image_url']) }}"
                  alt="">
                <h3 class="w-full text-center capitalize">
                  {{ $category['name'] }}</h3>
              </div>
            </a>
          @endforeach
        </div>
      </div>

      {{-- Recomendation product --}}
      <main class="w-screen min-h-50 bg-white p-10">
        <div class="w-7xl flex flex-col items-start gap-3 m-auto">
          <h2
            class="font-poppins w-full border-b-2 border-slate-300 text-xl font-semibold">
            Produk Pilihan Kami</h2>
            
          <div class="flex w-full flex-wrap gap-5">
            @foreach ($products as $product)
              <a class="block w-fit" href="{{ '/item/'. $product['id'] }}" data-aos="zoom-in-up">
              <div
                class="h-80 w-60 rounded-2xl border-2 p-2 shadow-[4px_4px_0_0_#000] transition-all hover:bg-gray-100 active:translate-x-[4px] active:translate-y-[4px] active:shadow-none">
                <img class="aspect-square w-full rounded-lg"
                  src="{{ asset($product['image_url']) }}" alt="" loading="lazy">
                  <p class="text-sm">Rp. {{ number_format($product['price'], 0, ',', '.') }}</p>
                <h3 class="w-full font-sans text-lg"> {{ Str::limit( $product['name'] , 40, '...') }}
                </h3>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </main>

    </div>
  </x-shop-layout>
</body>

</html>
