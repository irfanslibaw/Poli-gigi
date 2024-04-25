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
            background-image: linear-gradient(-45deg, #8A8B68, #FAD1AC);
        }
  </style>
</head>
<body>
<!-- component -->
    <form method="POST" action="{{ route('dokter.register') }}">
        @csrf

<div class="grid min-h-screen place-items-center">
    <div class="w-9/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 rounded-xl">
        <h1 class="text-3xl font-semibold flex justify-center">
            REGISTRASI AKUN
        </h1>
        <br>
        <!-- Nama -->
        <div class="mt-5">
            <label for="Nama" :value="__('Nama')" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Nama</label>
            <input id="Nama" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" type="text" name="nama" placeholder="contoh: Irfan Aja" :value="old('Nama')" required autofocus />
            <x-input-error :messages="$errors->get('Nama')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-5">
            <label for="email" :value="__('Email')" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Email</label>
            <input id="email" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" type="email" name="email" placeholder="contoh: Irfan@gmail.com" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <label for="password" :value="__('Password')" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
            <input id="password" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" type="password" name="password" placeholder="********" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-5">
            <label for="password_confirmation" :value="__('Confirm Password')" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Confirm password</label>
            <input id="password_confirmation" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" type="password" name="password_confirmation" placeholder="********"  required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <br>
        <div class="flex justify-center">
            <button type="submit" class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none" href="{{ route('login') }}">
            REGISTER
            </button>
        </div>
        <div class="text-center mt-4">
            <p class="justify-between inline-block mt-4 text-sm text-gray-800">Sudah memiliki akun? <a href="{{ url('login') }}" class="cursor-pointer hover:text-blue-800">Login</a></p><br>
        </div>
    </div>
</div>
</body>
</html>