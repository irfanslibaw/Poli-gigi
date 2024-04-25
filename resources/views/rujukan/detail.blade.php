@extends('sidebar')

@section('content')

<!-- content -->
<div class="flex-1 px-10">
    <nav class="rounded-md px-6 py-4 w-full">
        <ol class="list-reset float-right font-semibold hidden sm:flex">
            <li><a href="#" class="text-gray-800 hover:text-gray-900">Transaksi</a></li>
            <li><span class="text-gray-700 mx-2">/</span></li>
            <li><a href="#" class="text-gray-800">Tagihan Pasien</a></li>
        </ol>
        <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">TAGIHAN PASIEN</h3>
    </nav>

    <div class="grid place-items-center my-12">
        <div class="w-10/12 p-8 bg-white rounded-xl">
            <h1 class="flex justify-center text-2xl font-semibold">INFORMASI TAGIHAN</h1>
            <h2 class="flex justify-center text-md">Tagihan Pasien Klinik</h2>
            <br>
            <div class="p-3 tracking-wide">

                    <label for="pasien_id" class="ml-3 font-normal">Nama : {{ $rujukan->pasien->nama }}</label>
                    <br>

                    <label for="tanggal" class="ml-3 font-normal">Tanggal : {{ $rujukan->tanggal }}</label>
                    <br>

                    <label for="keluhan" class="ml-3 font-normal">Keluhan : {{ $rujukan->keluhan }}</label>
                    <br>

                    <div class="flex justify-center">
                        <a href="{{ url('rujukan') }}">
                        <button type="button" href=""
                            class="w-48 py-3 mt-6 font-normal tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Kembali
                        </button></a>
                    </div>
            </div>

        </div>
    </div>
</div>
<!-- content ends -->
@endsection
