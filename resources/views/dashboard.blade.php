@extends('sidebar')

@section('content')
       <!-- content -->
        <div class="flex-1 p-10 text-lg">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Dashboard</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">DASHBOARD</h3>
            </nav>
            <div class="md:container mx-auto my-12 px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-sm text-slate-900">Total Pendapatan</p>
                            <p class="text-xl text-gray-800 font-bold">Rp. {{ number_format($total_harga, 0, ',', '.') }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ Rp. {{ number_format($auu, 0, ',', '.') }}</span>
                                Bulan Ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Total Pengunjung</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pasien }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ {{ $pasien_bulan }}</span>
                                Bulan ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Total Booking</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pemesanann }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-green-700">+ {{ $pemesanan_bulan }}</span>
                                Bulan ini</p>
                        </div>
                    </div>

                    <div class="my-1 px-1 w-full  lg:my-4 lg:px-4 lg:w-3/12">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">

                            <p class="text-sm text-slate-900">Pending Pasien</p>
                            <p class="text-xl text-gray-800 font-bold">{{ $pemesanan_belum }}
                            <p>
                            <p class="text-sm text-slate-900"><span class="font-medium text-yellow-600">{{ $pending }}</span> Dalam
                                antrean</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:container mx-auto my-4 px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    <div class="my-1 px-1 w-full  md:w-2/3 lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-lg font-semibold text-center text-slate-900">Grafik Pegunjung</p>
                            <br>
                            <div class="grid grid-cols-3 gap-3 font-medium text-center">
                                <p>Total</p>
                                <p>Bulan ini</p>
                                <p>Bulan lalu</p>
                            </div>

                            <div class="grid grid-cols-3 gap-3 text-center">
                                <p>{{ $pemesanann }}</p>
                                <p>{{ $pemesanan_bulan }}</p>
                                <p>{{ $grafikalalu }}</p>
                            </div>

                            <br>

                            <div class="p-2 m-2 bg-slate-300 rounded shadow">
                                {!! $chart->container() !!}
                            </div>

                        </div>
                    </div>

                    <div class="my-1 px-1 w-full md:w-2/3 lg:my-4 lg:px-4 lg:w-1/2">
                        <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                            <p class="text-lg font-semibold text-center text-slate-900">Kepuasan Pegunjung</p>
                            <br>
                            <div class="grid grid-cols-3 gap-3 font-medium text-center">
                                <p>Total</p>
                                <p>Bulan ini</p>
                                <p>Bulan lalu</p>
                            </div>

                            <div class="grid grid-cols-3 gap-3 text-center">
                                <p>{{ $pengaduan }}</p>
                                <p>{{ $pengaduan_bulan }}</p>
                                <p>{{ $adu_grafik }}</p>
                            </div>

                            <br>

                            <div class="p-2 m-2 bg-slate-300 rounded shadow">
                                {!! $charts->container() !!}
                            </div>

                            <script src="{{ $chart->cdn() }}"></script>

                            {{ $chart->script() }}
                            {{ $charts->script() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
 <!-- content ends -->
