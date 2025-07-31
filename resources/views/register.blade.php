<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rancho&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
  @error ('message')
    <script>alert("{{ $message }}")</script>
  @enderror
  <div class="w-screen h-screen flex items-center justify-center">
    <div class="w-md max-lg:w-sm pt-15 pb-10 px-10 bg-white space-y-5 rounded-xl border-2 border-black shadow-[4px_4px_0_0_#000]">
      <h1 class="text-center text-xl font-bold font-poppins">Daftar Akun Baru</h1>

      <form action="register" class="space-y-5" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="name" class="px-3 py-2 w-full shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-sm focus:outline-0" required>
        <input type="text" name="username" id="username" placeholder="username" class="px-3 py-2 w-full shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-sm focus:outline-0" required>
        <input type="password" name="password" id="password" placeholder="password" class="px-3 py-2 w-full shadow-[inset_2px_2px_5px_#bebebe,_inset_-2px_-2px_5px_#fff] rounded-sm focus:outline-0" required>
        <button type="submit" class="w-full py-2 bg-[#5000A6] text-white rounded-sm border-2 border-black shadow-[4px_4px_0_0_#000] transition-all hover:bg-[#a271bf] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none">Register</button>
      </form>
      <p class="font-poppins">Sudah punya akun? <a href="/login" class="font-semibold italic">Login Akun</a></p>
      <div class="w-full text-xl mt-3"><a href="/" class="block hover:translate-x-[3px] hover:font-bold transition-all">&laquo; Back</a></div>
    </div>
  </div>
</body>

</html>
