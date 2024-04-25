<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('dist/output.css') }}" rel="stylesheet">
  <style>
        body {
            display: grid;
            background-size: 100% 100%;
            height: 100vh;
            background-image: linear-gradient(-45deg, #8A8B68, #FAD1AC);;
        }
  </style>
</head>

<body>
<!-- component -->

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('dokter.login') }}">
        @csrf
<div class="grid min-h-screen place-items-center">
    <div class="w-9/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 rounded-xl">
        <div class="flex justify-center pb-2">
            <img src="" class="object-none h-24 w-24">
        </div>
        <h1 class="text-xl font-semibold flex justify-center">
            POLI TEKNIK GIGI
        </h1>
        <h4 class="font-normal text-md flex justify-center">
            Bagian Dokter
        </h4>
        <form class="mt-5">
        <!-- Email Address -->
        <div>
            <label for="email" class="mt-2 text-xs font-semibold text-gray-600 uppercase" :value="__('Email')">Email</label>
            <input id="email" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" type="email" name="email" placeholder="contoh@gmail.com" autocomplete="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block mt-2 space text-xs font-semibold text-gray-600 uppercase" :value="__('Password')">Password</label>

            <input id="password" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner"
                            type="password"
                            name="password"
                            placeholder="********"
                            autocomplete="new-password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
            <div class="flex justify-center">
             <a href="{{ url('dashboarddokter') }}">
              <button type="submit" class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
              LOG IN
              </button>
             </a>
            </div>

        <div class="text-center mt-4">
            @if (Route::has('dokter.password.request'))
                <p class="justify-between inline-block mt-4 text-sm text-gray-500">Lupa Password?<a href="{{ route('dokter.password.request') }}"> Reset Password</a></p><br>
            @endif
                </div>
        </form>
    </div>
  </div>
</body>
</html>
