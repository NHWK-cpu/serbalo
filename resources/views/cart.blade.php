<!DOCTYPE html>
<html lang="en" class="overscroll-none">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Keranjang</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rancho&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-shop-layout>
    <div class="flex w-screen flex-col items-center gap-3" x-data>
      <div class="w-7xl mt-3 text-3xl"><a
          class="block transition-all hover:translate-x-[3px] hover:font-bold"
          href="/">&laquo; Back</a></div>
      @if (isset($items) && count($items) > 0)
        <div class="w-7xl flex flex-col items-center gap-5">

          {{-- Cart Items --}}
          @foreach ($items as $item)
            <main
              class="block w-[70%] rounded-lg border-2 border-black bg-white p-10 shadow-[0_4px_0_0_#000]">
              <div class="m-auto flex w-full flex-col items-start gap-5">
                <div class="flex w-full flex-row justify-between">
                  <h2 class="font-poppins text-2xl font-semibold">
                    {{ App\Models\Product::find($item['product_id'])->name }}
                  </h2>

                  <h3 class="font-sans text-3xl font-bold">
                    Rp.
                    {{ number_format(App\Models\Product::find($item['product_id'])->price * $item['quantity'], 0, ',', '.') }}
                  </h3>
                </div>

                <div class="flex w-full flex-row justify-between">
                  <p class="font-poppins text-lg">Jumlah: <span
                      class="font-semibold">{{ $item['quantity'] }}</span>
                  </p>
                  <a class="block w-fit rounded-lg border-2 border-black px-3 py-2 text-black shadow-[4px_4px_0_0_#000] transition-all active:translate-x-[4px] active:translate-y-[4px] active:shadow-none"
                    href="/delete-cart-item/{{ $item['id'] }}">Batalkan</a>
                </div>
              </div>
            </main>
          @endforeach

      @endif
    </div>

    </div>
  </x-shop-layout>

  @if (isset($items) && count($items) > 0)
    {{-- Check out --}}
    <div
      class="w-3xl absolute bottom-3 left-1/2 flex -translate-x-1/2 transform flex-row justify-between rounded-xl border-2 border-black bg-white px-10 py-5 shadow-[0_4px_0_0_#000]">
      <div>
        <p>Total</p>
        <p class="font-poppins font-bold">Rp.
          {{ number_format($total, 0, ',', '.') }}</p>
      </div>
      <form action="order-cart" method="POST">
        @csrf
        <button
          class="block w-fit cursor-pointer rounded-lg border-2 border-black bg-[#5000A6] px-3 py-2 text-white shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none"
          name="cart_id" type="submit"
          value="{{ App\Models\Cart::where('user_id', Auth::user()->id)->first()->id }}">Order</button>
      </form>
    </div>
  @endif
</body>

</html>
