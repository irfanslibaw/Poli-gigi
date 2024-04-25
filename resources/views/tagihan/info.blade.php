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


                    <label for="keluhan" class="ml-3 font-normal">Keluhan : {{ $pemesanan->keluhan }}</label>
                    <br>

                    <label for="alergi" class="ml-3 font-normal">Alergi : {{ $pemesanan->alergi }}</label>
                    <br>

                    <label for="pasien_id" class="ml-3 font-normal">Nama : {{ $pemesanan->pasien->nama }}</label>
                    <br>

                    <label for="dokter_id" class="ml-3 font-normal">Dokter : {{ $pemesanan->dokter->nama }}</label><br>

                    <label for="tanggal" class="ml-3 font-normal">Tanggal : {{ $pemesanan->tanggal }}</label><br>

                    <label for="waktu" class="ml-3 font-normal">Waktu : {{ $pemesanan->waktu }}</label><br>

                    <label for="ruang_id" class="ml-3 font-normal">Ruangan : {{ $pemesanan->ruang->nama_ruang
                        }}</label><br>


                    <label for="berat_badan" class="ml-3 font-normal">Berat Badan : {{ $pemesanan->berat_badan
                        }}</label><br>

                    <label for="tensi" class="ml-3 font-normal">Tekanan Darah : {{ $pemesanan->tensi }}</label><br>

                    <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-4 dark:bg-gray-700">

                    <label for="status" class="ml-3 font-normal">Status : {{ $pemesanan->status =
                        "Selesai"}}</label><br>

                    <label for="obat" class="ml-3 font-normal">Obat : {{ $pemesanan->obat->nama }}</label><br>


                    <label for="catatan" class="ml-3 font-normal">Catatan : {{ $pemesanan->catatan }}</label><br>

                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-6 dark:bg-gray-700">

                    <label for="jumlah_obat" class="ml-3 font-normal">Jumlah Obat : {{ $pemesanan->jumlah_obat }} X {{
                        number_format($pemesanan->obat->harga, 0, ',', '.') }}</label> <label class="float-right font-semibold">{{
                        number_format($obattt=$pemesanan->jumlah_obat*$pemesanan->obat->harga, 0, ',', '.') }}</label><br>

                    <label for="pelayanan_id" class="ml-3 font-normal">Pelayanan : {{ $pemesanan->pelayanan->nama
                        }}</label> <label class="float-right font-semibold">{{ number_format($pemesanan->pelayanan->harga, 0, ',', '.')
                        }}</label><br>

                    <label for="total" class="ml-3 font-normal">Total : </label> <label
                        class="float-right font-semibold">{{ number_format($total=$obattt+$pemesanan->pelayanan->harga, 0, ',', '.') }}</label><br>

                    <div class="flex justify-between">
                        <a href="{{ url('tagihan') }}">
                        <button type="button" href=""
                            class="w-48 py-3 mt-6 font-normal tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Kembali
                        </button></a>
                        <a href="{{ url('tagihan/'.$pemesanan->id.'/invoice') }}">
                        <button type="submit" name="submit"
                            class="w-48 py-3 mt-6 font-normal tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            Invoice
                        </button></a>
                    </div>
            </div>

        </div>
    </div>
</div>
<!-- content ends -->
@endsection
