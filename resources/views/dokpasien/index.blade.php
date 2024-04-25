@extends('headerdok')

@section('dokter')

                <!-- content -->
                <div class="flex-1 p-10">
                    <nav class="rounded-md px-6 py-4 w-full">
                        <ol class="list-reset float-right font-semibold hidden sm:flex">
                            <li><a href="#" class="text-gray-800 hover:text-gray-900">Transaksi</a></li>
                            <li><span class="text-gray-700 mx-2">/</span></li>
                            <li><a href="#" class="text-gray-800 hover:text-gray-900">Booking</a></li>
                        </ol>
                        <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">PEMESANAN
                            @auth
                            {{ auth()->user()->nama }}
                            @endauth</h3>
                    </nav>

                    <div class="h-screen max-w-7xl">
                        <section class="flex items-center text-gray-600">
                            <div class="container px-5 py-5 mx-auto">
                                <div class="my-1 px-1 w-full">
                                    <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                                    <br>
                                        @if (Session::has('successe'))
                                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                                            role="alert">
                                            <span class="font-medium">Pengubahan dilakukan!</span> Pastikan kembali jika data yang diuabh telah sesuai.
                                            {{Session::get('successe')}}
                                        </div>
                                        @endif
                                        <br>
                                        <div class="overflow-x-scroll">
                                            <table class="w-full text-sm text-left text-gray-600">
                                                <thead
                                                    class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 rounded-md">
                                                    <tr>
                                                        <th class="border-collapse border  p-2">No</th>
                                                        <th class="border-collapse border  p-2">Nama Pasien</th>
                                                        <th class="border-collapse border  p-2">Nama Dokter</th>
                                                        <th class="border-collapse border  p-2">Ruang</th>
                                                        <th class="border-collapse border  p-2">Pelayanan</th>
                                                        <th class="border-collapse border  p-2">Tanggal</th>
                                                        <th class="border-collapse border  p-2">Waktu</th>
                                                        <th class="border-collapse border  p-2">Alergi</th>
                                                        <th class="border-collapse border  p-2">Keluhan</th>
                                                        <th class="border-collapse border  p-2">Berat Badan</th>
                                                        <th class="border-collapse border  p-2">Tensi</th>
                                                        <th class="border-collapse border-y border-r-0  p-2">Status</th>
                                                        <th class="border-collapse border-y border-r-0  p-2">aksi</th>
                                                       <th class="border-collapse border-y border-l-0 border-r  p-2"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-gray-300 rounded-md">
                                                    <?php $i = $pemesanan->firstItem() ?>
                                                    @foreach ($pemesanan as $p)
                                                    <tr>
                                                        <td class="p-2">{{ $i }}</td>
                                                        <td class="p-2">{{ $p->pasien->nama }}</td>
                                                        <td class="p-2">{{ $p->dokter->nama }}</td>
                                                        <td class="p-2">{{ $p->ruang->nama_ruang }}</td>
                                                        <td class="p-2">{{ $p->pelayanan->nama }}</td>
                                                        <td class="p-2">{{ $p->tanggal }}</td>
                                                        <td class="p-2">{{ $p->waktu }}</td>
                                                        <td class="p-2">{{ $p->alergi }}</td>
                                                        <td class="p-2">{{ $p->keluhan }}</td>
                                                        <td class="p-2">{{ $p->berat_badan }}</td>
                                                        <td class="p-2">{{ $p->tensi }}</td>
                                                        <td class="p-2">
                                                            @if ($p->status == "S")
                                                                Sudah
                                                            @else
                                                                Belum
                                                            @endif
                                                        </td>
                                                        <td class="p-2">
                                                            <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')"
                                                                action="{{ url('pemesanan/'.$p->id) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" name="submit"
                                                                    class="float-right bg-red-500 text-white p-2 rounded-md">Hapus</button>
                                                            </form>
                                                        </td>
                                                        <td class="p-2">
                                                            <a href="{{ url('pemesanan/'.$p->id.'/edit') }}"
                                                                class="bg-yellow-500 text-white p-2 rounded-md">Ubah</a>
                                                        </td>
                                                    </tr>
                                                    <?php $i++?>
                                                     @endforeach
                                                </tbody>
                                            </table>
                                            {{ $pemesanan->links('pagination::tailwind') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
    @endsection
    <!-- content ends -->
