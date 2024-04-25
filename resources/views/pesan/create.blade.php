<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.8">
  <link href="{{ asset('../dist/output.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-neutral-800 via-teal-500 to-teal-700">
            <div class="grid place-items-center my-12">
                <div class="w-9/12 p-8 bg-white rounded-xl">
                    <h1 class="flex justify-center text-2xl font-semibold">PEMESANAN JADWAL</h1>
                    <h2 class="flex justify-center text-md">Praktik Dengan Dokter</h2>
                    <br>
                    <div class="pl-3 md:pl-0  w-full">
                        @if ($message = Session::get('success'))
                            <script>
                                alert('{{ $message }}');
                            </script>
                        @endif

                        <form action="{{ url('pesan') }}" method="post">
                            @csrf
                            <label for="keluhan" class="ml-3 font-medium">Keluhan</label>
                            <textarea rows="4" id="keluhan" type="text" name="keluhan" value="{{ Session::get
                                ('keluhan') }}" placeholder="" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner"></textarea>
                            <br>

                            <label for="alergi" class="ml-3 font-medium">Alergi</label>
                            <textarea rows="4" id="alergi" type="text" name="alergi" value="{{ Session::get
                                ('alergi') }}" placeholder="" required
                                class="block h-1/2 w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner"></textarea>
                            <br>

                            <label for="pasien_id" class="ml-3 font-medium">Nama</label>
                            <select id="pasien_id"  name="pasien_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option value>Pilih Pasien</option>
                                <br>
                                @foreach ($pasien as $pas)
                                <option value="{{ $pas->id }}">{{ $pas->nama }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for="dokter_id" class="ml-3 font-medium">Dokter</label>
                            <select id="dokter_id"  name="dokter_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option value>Pilih Dokter</option>
                                <br>
                                @foreach ($dokter as $dok)
                                <option value="{{ $dok->id }}">{{ $dok->nama }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for="tanggal" class="ml-3 font-medium">Tanggal </label>
                            <input id="tanggal" type="date" name="tanggal" value="{{ Session::get
                                ('tanggal') }}" placeholder="DD/MM/YY" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />
                            <br>

                            <label for="waktu" class="ml-3 font-medium">Waktu</label>
                            <input id="waktu" type="time" name="waktu" value="{{ Session::get
                                ('waktu') }}" placeholder="00:00" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />
                            <br>

                            <label for="ruang_id" class="ml-3 font-medium">Ruangan</label>
                            <select id="ruang_id"  name="ruang_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option value>Pilih Ruangan</option>
                                <br>
                                @foreach ($ruang as $rng)
                                <option value="{{ $rng->id }}">{{ $rng->nama_ruang }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for="pelayanan_id" class="ml-3 font-medium">Pelayanan</label>
                            <select id="pelayanan_id"  name="pelayanan_id" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option value>Pilih Pelayanan</option>
                                <br>
                                @foreach ($pelayanan as $ply)
                                <option value="{{ $ply->id }}">{{ $ply->nama }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for="berat_badan" class="ml-3 font-medium">Berat Badan</label>
                            <input id="berat_badan" type="text" name="berat_badan" value="{{ Session::get
                                ('berat_badan') }}" placeholder="Berat Badan Pasien" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />
                            <br>

                            <label for="tensi" class="ml-3 font-medium">Tekanan Darah</label>
                            <input id="tensi" type="text" name="tensi" value="{{ Session::get
                                ('tensi') }}" placeholder="Tekanan Darah Pasien" required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />
                            <br>

                            <label for="status" class="ml-3 font-medium">Status</label>
                            <select id="status" name="status"required
                                class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>Pilih Status</option>
                                <br>
                                <option value="B">Belum</option>
                            </select>
                            <br>

                            <input type="hidden" name="obat_id" id="obat_id" value=""
                                class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">

                            <input type="hidden" name="jumlah_obat" id="jumlah_obat" value=""
                                class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">

                            <input type="hidden" name="catatan" id="catatan" value=""
                                class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">


                            <div class="flex justify-center">
                                <button type="submit" name="submit"
                                    class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Buat Pesanan
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- content ends -->

</body>
</html>


