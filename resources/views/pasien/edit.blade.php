@extends('sidebar')

@section('content')
        <!-- content -->
        <div class="flex-1 px-10">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Data</a></li>
                    <li><span class="text-gray-700 mx-2">/</span></li>
                    <li><a href="#" class="text-gray-800">Pasien</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">DATA PASIEN</h3>
            </nav>

            <div class="grid place-items-center my-12">
                <div class="w-10/12 p-8 bg-white rounded-xl">
                    <div class="pl-3 md:pl-0  w-full">
                        <h1 class="flex justify-center text-2xl font-semibold">DATA PASIEN</h1>
                        <h2 class="flex justify-center text-md">Ubah Data Pasien Dengan Benar</h2>
                        <br>

                        <form action="{{ url('pasien/' .$pasien->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="space-y-2">
                                <label for="nama" class="ml-3 font-medium">Nama</label>
                                <input type="text" name="nama" id="nama" required value="{{ $pasien->nama }}"
                                    class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <div class="space-y-2">
                                <label for="umur" class="ml-3 font-medium">Umur</label>
                                <input type="text" name="umur" id="umur" required value="{{ $pasien->umur }}"
                                    class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <div class="space-y-2">
                                <label for="alamat" class="ml-3 font-medium">Alamat</label>
                                <textarea name="alamat" id="alamat" required value="{{ $pasien->alamat }}" rows="4" class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                </textarea>
                            </div>
                            <br>

                            <div class="space-y-2">
                                <label for="email" class="ml-3 font-medium">Email</label>
                                <input type="email" name="email" id="email" required value="{{ $pasien->email }}"
                                    class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <div class="space-y-2">
                                <label for="no_hp" class="ml-3 font-medium">Nomor Telepon</label>
                                <input type="number" name="no_hp" id="no_hp" required value="{{ $pasien->no_hp }}"
                                    class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <div class="space-y-2">
                                <label for="nik" class="ml-3 font-medium">NIK</label>
                                <input type="number" name="nik" id="nik" required value="{{ $pasien->nik }}"
                                    class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            </div>
                            <br>

                            <label for="kelamin"class="ml-3 font-medium">Jenis Kelamin</label>
                            <select id="kelamin" name="jenis_kelamin"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                                <option disabled value>pilih gender</option>
                                <option value="L">laki</option>
                                <option value="P">cwe</option>
                            </select>
                            <br>

                            <div class="flex justify-between"><a href="{{ url('pasien') }}">
                                <button type="button" href=""
                                    class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Kembali
                                </button></a>
                                <button type="submit" name="submit"
                                    class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none">
                                    Simpan
                                </button>
                            </div>
                            <br>
                    </form>

                    </div>

                </div>
            </div>
        </div>

        @endsection
        <!-- content ends -->
