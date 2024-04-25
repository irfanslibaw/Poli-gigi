<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <link href="{{ asset('../dist/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-neutral-800 via-teal-500 to-teal-700">
    <div class="grid min-h-screen place-items-center">
        <div class="w-10/12 p-12 bg-stone-800 text-white sm:w-8/12 md:w-1/2 lg:w-5/12 rounded-xl">
            <div class="flex justify-center">
                <h2 class="text-3xl font-semibold">POLI TEKNIK GIGI</h2>
            </div>
            <div class="flex justify-center">
                <h5 class="py-2">Dari hati melayani pasien kami</h5>
            </div>
            <br>
            <div class="flex justify-center gap-3 ">
               <a href="{{ url('login') }}">
                <button type="submit" class="w-36 md:w-48 py-3 px-4 mt-6 font-medium tracking-widest text-black uppercase bg-stone-50 shadow-lg rounded-xl focus:outline-none hover:bg-stone-700 hover:text-white hover:font-bold hover:shadow-none">
                    ADMIN
                </button>
               </a>
                <br>
               <a href="{{ url('dokter/login') }}">
                <button type="submit" class="w-36 md:w-48 py-3 px-4 mt-6 font-medium tracking-widest text-black uppercase bg-stone-50 shadow-lg rounded-xl focus:outline-none hover:bg-stone-700 hover:text-white hover:font-bold hover:shadow-none">
                    DOKTER
                </button>
               </a>
            </div>
            <br>
            <div class="flex justify-center gap-2">
                <div class="w-52 h-64 p-3 relative overflow-visible shadow-sm rounded-md">
                    <div class="bg-zinc-500 h-2/4 w-full rounded-lg transition ease-in-out delay-300 hover:-translate-y-5 shadow-amber-300">
                        <img src="#">
                    </div>
                    <div class="pt-4">
                      <p class="font-black text-lg leading-7 tracking-wider uppercase">Klinik Kami</p>
                      <p class="text-xs pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil fugit molestias iure.</p>
                    </div>
                    <div class="w-full flex justify-between items-center pt-3 border-t-2 border-neutral-500">
                    <span class="font-bold text-md leading-6 uppercase">Sejak 2099</span>
                  </div>
                </div>
                <div class="w-52 h-64 p-3 relative overflow-visible shadow-sm rounded-md">
                    <div class="bg-zinc-500 h-2/4 w-full rounded-lg transition ease-in-out delay-300 hover:-translate-y-5 shadow-amber-300">
                        <img src="#">
                    </div>
                    <div class="pt-4">
                      <p class="font-black text-lg leading-7 tracking-wider uppercase">melayani</p>
                      <p class="text-xs pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil fugit molestias iure.</p>
                    </div>
                    <div class="w-full flex justify-between items-center pt-3 border-t-2 border-neutral-500">
                    <span class="font-bold text-md leading-6 uppercase">bpjs & mandiri</span>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
