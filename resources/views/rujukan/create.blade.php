<!-- content -->

@extends('sidebar')

@section('content')

<div class="flex-1 px-10">
    <nav class="rounded-md px-6 py-4 w-full">
        <ol class="list-reset float-right font-semibold hidden sm:flex">
            <li><a href="#" class="text-gray-800 hover:text-gray-900">Report</a></li>
            <li><span class="text-gray-700 mx-2">/</span></li>
            <li><a href="#" class="text-gray-800">Surat Rujukan</a></li>
        </ol>
        <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">SURAT RUJUKAN</h3>
    </nav>

    <div class="grid place-items-center my-12">
        <div class="w-10/12 p-8 bg-white rounded-xl">
            <div class="flex justify-center text-2xl font-semibold">{{ __('Form Surat Rujukan') }}</div>

            <div class="p-3 tracking-wide">
                <form method="POST" action="{{ url('rujukan') }}">
                    @csrf
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
                   


                    <div class="space-y-2">
                        <label for="umur" class="ml-3 font-medium">Umur</label>
                        <input type="text" name="umur" id="umur" required value="{{ Session::get
                            ('umur') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>
                    <br>

                    <div class="space-y-2">
                        <label for="alamat" class="ml-3 font-medium">Alamat</label>
                        <textarea name="alamat" id="alamat" required value="{{ Session::get
                            ('alamat') }}" rows="4" class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                        </textarea>
                    </div>
                    <br>

                    <div class="space-y-2">
                        <label for="no_hp" class="ml-3 font-medium">Nomor Telepon</label>
                        <input type="text" name="no_hp" id="no_hp" required value="{{ Session::get
                            ('no_hp') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>
                    <br>

                        <label for="keluhan" class="ml-3 font-medium">Keluhan</label>
                    <textarea rows="4" id="keluhan" type="text" name="keluhan" value="{{ Session::get
                        ('keluhan') }}" placeholder="" required
                        class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner"></textarea>
                    <br>

                    <label for="diagnosa" class="ml-3 font-medium">Diagnosa</label>
                    <textarea rows="4" id="diagnosa" type="text" name="diagnosa" value="{{ Session::get
                        ('diagnosa') }}" placeholder="" required
                        class="block h-1/2 w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner"></textarea>
                        <br>

                    <div class="space-y-2">
                        <label for="kasus" class="ml-3 font-medium">Kasus</label>
                        <input type="text" name="kasus" id="kasus" required value="{{ Session::get
                            ('kasus') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>
                    <br>

                    <div class="space-y-2">
                        <label for="terapi" class="ml-3 font-medium">Terapi</label>
                        <input type="text" name="terapi" id="terapi" required value="{{ Session::get
                            ('terapi') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>

                    <label for="tanggal" class="ml-3 font-medium">Tanggal </label>
                    <input id="tanggal" type="date" name="tanggal" value="{{ Session::get
                        ('tanggal') }}" placeholder="DD/MM/YY" required
                        class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner" />
                        <br>

                    <label for="dokter_id" class="ml-3 font-medium">Dokter Perujuk</label>
                        <select id="dokter_id"  name="dokter_id" required
                            class="block w-full p-3 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                            <option value>Pilih Dokter</option>
                            <br>
                            @foreach ($dokter as $dok)
                            <option value="{{ $dok->id }}">{{ $dok->nama }}</option>
                            @endforeach
                        </select>
                    <br>

                    <div class="space-y-2">
                        <label for="dr_tujuan" class="ml-3 font-medium">Dokter Tujuan</label>
                        <input type="text" name="dr_tujuan" id="dr_tujuan" required value="{{ Session::get
                            ('dr_tujuan') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>
                    <br>

                    <div class="space-y-2">
                        <label for="rs_tujuan" class="ml-3 font-medium">Rumah Sakit Tujuan</label>
                        <input type="text" name="rs_tujuan" id="rs_tujuan" required value="{{ Session::get
                            ('rs_tujuan') }}"
                            class="block w-full p-2 mt-2 rounded-xl text-gray-900 bg-stone-50 appearance-none focus:outline-gray-800 focus:bg-gray-100 focus:shadow-inner">
                    </div>
                    <br>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-48 py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg rounded-xl focus:outline-none hover:bg-gray-900 hover:shadow-none"
                            name="submit">
                            SIMPAN
                        </button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
