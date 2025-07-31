<!DOCTYPE html>
<html lang="en" class="overscroll-none">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Status Pesanan</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rancho&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.store('single', {
        show: false
      });
      Alpine.store('chart', {
        show: false
      });
    });
  </script>

  <x-shop-layout>
    <div class="flex w-screen flex-col items-center gap-3" x-data>
      <div class="w-7xl mt-3 text-3xl"><a
          class="block transition-all hover:translate-x-[3px] hover:font-bold"
          href="/">&laquo; Back</a></div>
      <div class="w-7xl flex flex-col gap-5 items-center">

        {{-- Ordered Item --}}
        @foreach ($orders as $order)
          <main
            class="block w-[70%] rounded-lg border-2 border-black bg-white p-10 shadow-[8px_8px_0_0_#000]">
            <div class="m-auto flex w-full flex-col items-start gap-5">
              <h2 class="font-poppins text-2xl font-semibold">
                {{ $order['status'] }}</h2>

              <h3 class="font-sans text-3xl font-bold">
                Rp. {{ number_format($order['total'], 0, ',', '.') }}
              </h3>

              <div>
              <p class="font-poppins text-lg">Produk dibeli: </p>
              <ul>
                @foreach (App\Models\OrderItem::where('order_id',$order['id'])->get() as $product)
                <li
                class="font-semibold list-disc ml-5">{{ App\Models\Product::find($product['product_id'])->name }}</li>
                @endforeach
              </ul>
              </div>

              {{-- <span class="border-b-2">Detail</span>
              <p>{{ $product_selected['description'] }}</p>
              <div class="flex flex-row gap-5">
                <button
                  class="block w-fit cursor-pointer rounded-lg border-2 border-black bg-[#5000A6] p-3 text-white shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none"
                  href="/append-chart/{{ $product_selected['id'] }}"
                  @click="$store.chart.show = !$store.chart.show; $store.single.show = false"><svg
                    xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                    <path
                      d="M440-600v-120H320v-80h120v-120h80v120h120v80H520v120h-80ZM280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM40-800v-80h131l170 360h280l156-280h91L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68.5-39t-1.5-79l54-98-144-304H40Z" />
                  </svg></button>
                <button
                  class="block w-fit cursor-pointer rounded-lg border-2 border-black bg-[#5000A6] p-3 text-white shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none"
                  @click="$store.single.show = !$store.single.show; $store.chart.show = false">Beli
                  sekarang</button>
              </div> --}}
            </div>
          </main>
        @endforeach

      </div>

    </div>
  </x-shop-layout>
</body>

</html>
