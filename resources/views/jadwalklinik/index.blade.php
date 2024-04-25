@extends('headerdok')

@section('dokter')

        <!-- content -->
        <div class="flex-1 p-10 text-lg">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Jadwal Klinik</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">JADWAL KLINIK</h3>
            </nav>

            <div class="h-screen">
              <section class="flex items-center text-gray-600">
                <div class="container px-5 py-5 mx-auto">
                  <div class="my-1 px-1 w-full">
                    <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                        <div class="p-2">
                            <h2 class="flex justify-center font-semibold">Jadwal Praktik Poli Teknik Gigi</h2>
                            <br>
                            <div class="grid grid-cols-2 gap-3 font-medium text-center">
                                <p>Hari</p>
                                <p>Waktu</p>
                            </div>
                            <br>
                            <div class="grid grid-cols-2 grid-rows-2 gap-3 text-center">
                                <p>Senin</p>
                                <p>00:00-00:00</p>
                                <p>Selasa</p>
                                <p>00:00-00:00</p>
                                <p>Rabu</p>
                                <p>00:00-00:00</p>
                                <p>Kamis</p>
                                <p>00:00-00:00</p>
                                <p>Jumat</p>
                                <p>00:00-00:00</p>
                            </div>

                            <br>

                        </div>
                    </div>

                    <br>

                    <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                        <div class="p-2">
                            <h2 class="flex justify-center font-semibold">Dokter yang Bertugas di Klinik</h2>
                            <br>
                            <div class="grid grid-cols-2 gap-3 font-medium">
                                <p class="text-center">No</p>
                                <p class="text-left ml-48">Nama</p>
                            </div>
                            <?php $i = $dokter->firstItem() ?>
                            @foreach ($dokter as $d)
                            <div class="grid grid-cols-2 gap-3 font-medium">
                                <p class="text-center">{{ $i }}</p>
                                <p class="text-left ml-48">{{ $d->nama }}</p>
                            </div>
                            <?php $i++?>
                            @endforeach
                        </div>

                  </div>
                </div>
              </section>
            </div>
        </div>
        <!-- content ends -->


@endsection
