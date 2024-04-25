<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
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
<div class="grid min-h-screen place-items-center">
    <div class="w-9/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 rounded-xl">
        <h1 class="text-3xl font-semibold flex justify-center">
            Reset Password
        </h1>
        <h4 class="font-light text-md flex justify-center text-center">
            Setelah ini mohon periksa email anda<br> untuk mendapatkan link pengubahan password
        </h4>
        <br>
        <br>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('dokter.password.email') }}">
        @csrf

        <!-- Email Address -->
        <div form class="mt-5">>
            <label for="email" :value="__('Email')" class="mt-2 text-xs font-semibold text-gray-600 uppercase">Email Pengubahan Password</label>
            <input id="email" placeholder="contoh@gmail.com" autocomplete="email" class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-2 focus:bg-gray-100 focus:shadow-inner" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <br>
            <div class="flex justify-center">
              <button type="submit" onclick="document.location='A-password.html';" class="w-72 py-3 px-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
              KIRIM LINK VERIFIKASI
              </button>
            </div>
            <div class="text-center mt-4">
            <p class="justify-between inline-block mt-4 text-sm text-gray-500">Kembali <a href="{{ url('dokter/login') }}" class="cursor-pointer hover:text-blue-800">Ke Halaman Sebelumnya</a></p><br>
          </div>
        </form>
    </div>
  </div>
</body>
</html>