<header class="w-dvw h-fit px-10 py-5 bg-gradient-to-b from-[#280053] to-[#5000A6] text-slate-100 flex items-center justify-around">
    <a href="/"><h1 class="font-rancho-regular text-5xl w-fit h-fit">Serbalo</h1></a>
    <form action="" class="flex items-center gap-5">
        <input type="text" class="w-2xl h-fit py-2 px-3 rounded-xl bg-[rgba(217,217,217,0.4)]" placeholder="Cari produk"></input>
        <button type="submit" class="w-10 cursor-pointer"><img src="{{ asset('icons/Search_Icon.png') }}" alt="search"></button>
    </form>

    {{-- App\Models\Category::create(['name'=>'sembako', 'image_url'=>'icons/Sembako.png']); --}}
    <div class="space-x-3 flex flex-row">
        <a href="/login" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">Login</a>
        <a href="/register" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">Register</a>
    </div>
</header>