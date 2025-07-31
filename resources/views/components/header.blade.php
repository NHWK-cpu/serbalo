<header class="w-dvw h-fit px-10 py-5 bg-gradient-to-b from-[#280053] to-[#5000A6] text-slate-100 flex items-center justify-around">
    <a href="/"><h1 class="font-rancho-regular text-5xl w-fit h-fit">Serbalo</h1></a>
    <form action="" class="flex items-center gap-5">
        <input type="text" class="w-2xl h-fit py-2 px-3 rounded-xl bg-[rgba(217,217,217,0.4)]" placeholder="Cari produk"></input>
        <button type="submit" class="w-10 cursor-pointer"><img src="{{ asset('icons/Search_Icon.png') }}" alt="search"></button>
    </form>

    <div class="space-x-3 flex flex-row">
        @auth
            @if (Auth::user()->isAdmin())
                <a href="/" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm112-260q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Z"/></svg>
            </a>
            @endif
            <a href="/cart" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">
                {{-- Perlu update: jika keranjang kosong maka ganti ke cart non-fill, jika ada isi maka sebaliknya --}}
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM208-800h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Z"/></svg>
            </a>
            <a href="/order-status" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">
                {{-- Perlu update: jika keranjang kosong maka ganti ke cart non-fill, jika ada isi maka sebaliknya --}}
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="m53-250 15-60h199l-15 60H53Zm80-160 15-60h239l-15 60H133Zm625 270 7-50 19-160 22-180 16-130-64 520ZM211-80q-24 0-38.5-18T158-140h600l64-520H682l-11 90q-2 13-11.5 21.5T637-540q-12 0-20-9t-6-21l11-90H442l-11 90q-2 13-11.5 21.5T397-540q-12 0-20-9t-6-21l11-90H222q3-26 22-43t45-17h100l2-10q9-72 52.5-111T559-880q61 0 99.5 48.5T689-720h140q24 0 40 18t13 42l-64 520q-3 26-22 43t-45 17H211Zm238-640h180q5-39-17.5-69.5T552-820q-43 0-69.5 23.5T451-730l-2 10Z"/></svg>
            </a>
            <a href="/logout" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">Logout</a>
        @endauth
        @guest
            <a href="/login" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">Login</a>
            <a href="/register" class="block bg-[#5000A6] border-1 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#280053] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none px-5 py-2 rounded-md">Register</a>
        @endguest
    </div>
</header>