<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Produk</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rancho&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-shop-layout>
    <div class="w-screen items-center flex flex-col gap-3">
      <div class="w-7xl text-3xl mt-3"><a href="/" class="block hover:translate-x-[3px] hover:font-bold transition-all">&laquo; Back</a></div>
      <div class="flex w-7xl flex-row gap-5">

        {{-- Item Preview --}}
        <div class="w-[30%]">
          <div
            class="w-full aspect-square overflow-hidden rounded-lg bg-white border-2 border-black shadow-[8px_8px_0_0_#000]">
            <img class="h-full object-cover object-center"
              src="{{ asset($product_selected['image_url']) }}">
          </div>
        </div>

        {{-- Recomendation product --}}
        <main class="w-[70%] bg-white p-10 block rounded-lg border-2 border-black shadow-[8px_8px_0_0_#000]">
          <div class="w-full m-auto flex flex-col items-start gap-5">
            <h2
              class="font-poppins text-2xl font-semibold">
              {{ $product_selected['name'] }}</h2>

            <h3 class="font-sans text-3xl font-bold ">
              Rp. {{ number_format($product_selected['price'], 0, ',', '.') }}
            </h3>

            <span class="border-b-2">Detail</span>
            <p>{{ $product_selected['description'] }}</p>
            <div class="flex flex-row gap-5">
              <a href="" class="block w-fit p-3 bg-[#5000A6] text-white rounded-lg border-2 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-600v-120H320v-80h120v-120h80v120h120v80H520v120h-80ZM280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM40-800v-80h131l170 360h280l156-280h91L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68.5-39t-1.5-79l54-98-144-304H40Z"/></svg></a>
              <a href="" class="block w-fit p-3 bg-[#5000A6] text-white rounded-lg border-2 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none">Beli sekarang</a>
            </div>
          </div>
        </main>

      </div>
    </div>
  </x-shop-layout>
</body>

</html>
