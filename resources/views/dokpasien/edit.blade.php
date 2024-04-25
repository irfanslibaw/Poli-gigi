@extends('headerdok')

@section('dokter')

      <!-- content -->
       <div class="flex-1 px-10">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Transaksi</a></li>
                    <li><span class="text-gray-700 mx-2">/</span></li>
                    <li><a href="#" class="text-gray-800">Booking</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">PEMESANAN</h3>
            </nav>

            <div class="grid place-items-center my-12">
                <div class="w-10/12 p-8 bg-white rounded-xl">
                    <h1 class="flex justify-center text-2xl font-semibold">PEMESANAN JADWAL</h1>
                    <h2 class="flex justify-center text-md">Ubah Jadwal Pasien</h2>
                    <br>
                    <div class="pl-3 md:pl-0  w-full">
                        <form action="{{ url('pemesanan/' .$pemesanan->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <label for="keluhan" class="ml-3 font-medium">Keluhan</label>
                            <textarea rows="4" id="keluhan" type="text" name="keluhan" value="{{ $pemesanan->keluhan }}" placeholder="" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">{{ $pemesanan->keluhan }}</textarea>
                            <br>

                            <label for="alergi" class="ml-3 font-medium">Alergi</label>
                            <textarea rows="4" id="alergi" type="text" name="alergi" value="{{ $pemesanan->alergi }}" placeholder="" required
                                class="block h-1/2 w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">{{ $pemesanan->alergi }}</textarea>

                            <label for="pasien_id" class="ml-3 font-medium">Nama</label>
                            <select id="pasien_id"  name="pasien_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Pilih Pasien</option>
                                <option value="{{ $pemesanan->pasien_id }}">{{ $pemesanan->pasien->nama }}</option>
                                <br>
                                @foreach ($pasien as $pas)
                                <option value="{{ $pas->id }}">{{ $pas->nama }}</option>
                                @endforeach
                            </select>

                            <label for="dokter_id" class="ml-3 font-medium">Dokter</label>
                            <select id="dokter_id"  name="dokter_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Pilih Dokter</option>
                                <option value="{{ $pemesanan->dokter_id }}">{{ $pemesanan->dokter->nama }}</option>
                                <br>
                                @foreach ($dokter as $dok)
                                <option value="{{ $dok->id }}">{{ $dok->nama }}</option>
                                @endforeach
                            </select>

                            <label for="tanggal" class="ml-3 font-medium">Tanggal </label>
                            <input id="tanggal" type="date" name="tanggal" value="{{ $pemesanan->tanggal }}" placeholder="DD/MM/YY" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />

                            <label for="waktu" class="ml-3 font-medium">Waktu</label>
                            <input id="waktu" type="time" name="waktu" value="{{ $pemesanan->waktu }}" placeholder="00:00" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />

                            <label for="ruang_id" class="ml-3 font-medium">Ruangan</label>
                            <select id="ruang_id"  name="ruang_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Pilih Ruangan</option>
                                <option disabled value="{{ $pemesanan->ruang_id }}">{{ $pemesanan->ruang->nama_ruang }}</option>
                                <br>
                                @foreach ($ruang as $rng)
                                <option value="{{ $rng->id }}">{{ $rng->nama_ruang }}</option>
                                @endforeach
                            </select>

                            <label for="pelayanan_id" class="ml-3 font-medium">Pelayanan</label>
                            <select id="pelayanan_id"  name="pelayanan_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Pilih Keluhan</option>
                                <option value="{{ $pemesanan->pelayanan_id }}">{{ $pemesanan->pelayanan->nama }}</option>
                                <br>
                                @foreach ($pelayanan as $ply)
                                <option value="{{ $ply->id }}">{{ $ply->nama }}</option>
                                @endforeach
                            </select>

                            <label for="berat_badan" class="ml-3 font-medium">Berat Badan</label>
                            <input id="berat_badan" type="text" name="berat_badan" value="{{ $pemesanan->berat_badan }}" placeholder="00 kg" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />

                            <label for="tensi" class="ml-3 font-medium">Tekanan Darah</label>
                            <input id="tensi" type="text" name="tensi" value="{{ $pemesanan->tensi }}" placeholder="120/90" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />

                                <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

                            <label for="obat" class="ml-3 font-medium">Obat</label>
                            <select id="dokter_id"  name="obat_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option value>Pilih Obat</option>
                                <br>
                                @foreach ($obat as $obt)
                                <option value="{{ $obt->id }}">{{ $obt->nama }}</option>
                                @endforeach
                            </select>

                            <label for="jumlah_obat" class="ml-3 font-medium">Jumlah Obat</label>
                            <input type="number" name="jumlah_obat" id="jumlah_obat" required value="{{ Session::get
                                ('jumlah_obat') }}"
                                class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">

                            <label for="catatan" class="ml-3 font-medium">Catatan</label>
                            <input type="text" name="catatan" id="catatan" required value="{{ Session::get
                                ('catatan') }}"
                                class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">

                            <hr class="w-48 h-1 mx-auto my-2 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

                                <label for="status" class="ml-3 font-medium">Status</label>
                            <select id="status" name="status"required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Status</option>
                                <br>
                                <option value="S">Sudah</option>
                            </select>

                            <div class="flex justify-between"><a href="{{ url('dokpasien') }}">
                                <button type="button" href=""
                                    class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Kembali
                                </button></a>
                                <button type="submit" name="submit"
                                    class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- content ends -->
        @endsection
