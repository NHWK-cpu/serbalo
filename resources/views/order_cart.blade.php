<!DOCTYPE html>
<html lang="en" class="overscroll-none">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order</title>
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
      <div class="flex w-4xl flex-col gap-5">

        {{-- Order Details --}}
        
        <main class="w-full bg-white p-10 block rounded-lg border-2 border-black shadow-[8px_8px_0_0_#000]">
          <div class="w-full m-auto flex flex-col items-start gap-5">
            <h1>Detail Pesanan</h1>
            
            @foreach ($items as $item)

            <div class="flex flex-row justify-between w-full">
            <div>
            <p class="text-black">Item dipesan</p>
            <h2
              class="font-poppins text-xl font-semibold">
              {{ App\Models\Product::find($item->product_id)->name }}</h2>
            </div>

            <div class="grid grid-cols-5 items-end">
            <div class="col-span-2">
            <p>Harga satuan:</p>
            <h3 class="font-sans text-xl font-bold ">
              Rp. {{ number_format(App\Models\Product::find($item->product_id)->price, 0, ',', '.') }}
            </h3>
            </div>
            <svg class="col-span-1" xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#000"><path d="m560-242-43-42 168-168H160v-60h525L516-681l43-42 241 241-240 240Z"/></svg>
            <div class="col-span-2">
            <p>Harga total:</p>
            <h3 class="font-sans text-2xl font-bold ">
              Rp. {{ number_format(App\Models\Product::find($item->product_id)->price * $item->quantity, 0, ',', '.') }}
            </h3>
            </div>
            </div>
            </div>

            <p class="text-lg font-poppins border-b-2 border-gray-300 w-full">Jumlah dipesan: <span class="font-semibold">{{ $item->quantity }}</span></p>

            @endforeach

            <h4 class="font-semibold text-lg italic">Total Keseluruhan: <span class="font-bold font-poppins">{{ $total_price }}</span></h4>

            <p class="border-b-2 italic">Informasi Pengiriman</p>
            <form action="attempt-order-cart" class="grid grid-cols-2 space-y-2" method="POST">
              @csrf
              <input type="text" value="{{ $total_price }}" class="hidden" name="total_price">
              <input type="text" value="{{ $cart }}" class="hidden" name="cart_id">
              <label for="address">Diantar ke: </label>
              <input type="text" class="border-2 rounded-lg" name="address" id="address" required>
              <label for="customer_name">Penerima atas nama: </label>
              <input type="text" class="border-2 rounded-lg" name="custome_name" id="customer_name" required>
              <button type="submit" class="block w-fit cursor-pointer rounded-lg border-2 border-black bg-[#5000A6] px-3 py-2 text-white shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none">Checkout</button>
            </form>
            
          </div>
        </main>

      </div>
    </div>
  </x-shop-layout>
</body>

</html>
