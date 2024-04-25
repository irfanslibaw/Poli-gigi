@extends('headerdok')

@section('dokter')

        <!-- content -->
        <div class="flex-1 p-10 text-lg">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Dashboard</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">DASHBOARD @auth
                    {{ auth()->user()->nama }}
                @endauth</h3>
            </nav>
            <div class="md:container mx-auto my-12 px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-sm text-slate-900">Total Pasien</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pasien }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ {{ $pasien_bulan }}</span>
                                Bulan Ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Total Booking Klinik</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pemesanan }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ {{ $pemesanan_belum }}</span>
                                Bulan Ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Pasien Saya</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pasien_saya }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ {{ $saya_bulan }}</span>
                                Bulan Ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Pending Pasien Hari Ini</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pending }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-yellow-600">{{ $pemesanan_belum }}</span> Dalam
                                antrean</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:container mx-auto my-4 px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <div class="my-1 px-1 w-full  md:w-2/3 lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-lg font-semibold text-center text-slate-900">Pasien Dalam Antrean</p>
                            <br>
                                <table class="w-full text-sm text-left text-gray-600">
                                    <thead
                                        class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 rounded-md">
                                        <tr>
                                            <th class="border-collapse border  p-2">No</th>
                                            <th class="border-collapse border  p-2">Nama Pasien</th>
                                            <th class="border-collapse border  p-2">Tanggal</th>
                                            <th class="border-collapse border  p-2">Waktu</th>
                                            <th class="border-collapse border  p-2">Keluhan</th>
                                            <th class="border-collapse border-y border-r-0  p-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-300 rounded-md">
                                        <?php $i = $belum->firstItem() ?>
                                        @foreach ($belum as $p)
                                        <tr>
                                            <td class="p-2">{{ $i }}</td>
                                            <td class="p-2">{{ $p->pasien->nama }}</td>
                                            <td class="p-2">{{ $p->tanggal }}</td>
                                            <td class="p-2">{{ $p->waktu }}</td>
                                            <td class="p-2">{{ $p->keluhan }}</td>
                                            <td class="p-2 font-bold text-red-700">
                                                @if ($p->status == "S")
                                                    Sudah
                                                @else
                                                    Belum
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $i++?>
                                            @endforeach
                                    </tbody>
                                </table>
                                {{ $belum->links('pagination::tailwind') }}
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full md:w-2/3 lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-lg font-semibold text-center text-slate-900">Pasien Selesai Pemeriksaan</p>
                            <br>
                            <table class="w-full text-sm text-left text-gray-600">
                                <thead
                                    class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 rounded-md">
                                    <tr>
                                        <th class="border-collapse border  p-2">No</th>
                                        <th class="border-collapse border  p-2">Nama Pasien</th>
                                        <th class="border-collapse border  p-2">Tanggal</th>
                                        <th class="border-collapse border  p-2">Waktu</th>
                                        <th class="border-collapse border  p-2">Keluhan</th>
                                        <th class="border-collapse border-y border-r-0  p-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-300 rounded-md">
                                    <?php $z = $sudah->firstItem() ?>
                                    @foreach ($sudah as $k)
                                    <tr>
                                        <td class="p-2">{{ $z }}</td>
                                        <td class="p-2">{{ $k->pasien->nama }}</td>
                                        <td class="p-2">{{ $k->tanggal }}</td>
                                        <td class="p-2">{{ $k->waktu }}</td>
                                        <td class="p-2">{{ $k->keluhan }}</td>
                                        <td class="p-2 font-bold text-green-700 ">
                                            @if ($k->status == "S")
                                                Sudah
                                            @else
                                                Belum
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $z++?>
                                        @endforeach
                                </tbody>
                            </table>
                            {{ $sudah->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
        <!-- content ends -->

