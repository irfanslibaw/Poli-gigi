@extends('sidebar')

@section('content')
        <!-- content -->
        <div class="flex-1 p-10">
            <nav class="rounded-md px-6 py-4 w-full">
                <ol class="list-reset float-right font-semibold hidden sm:flex">
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Data</a></li>
                    <li><span class="text-gray-700 mx-2">/</span></li>
                    <li><a href="#" class="text-gray-800 hover:text-gray-900">Ruangan</a></li>
                </ol>
                <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">DATA RUANGAN</h3>
            </nav>

            <div class="h-screen max-w-7xl">
                <section class="flex items-center text-gray-600">
                    <div class="container px-5 py-5 mx-auto">
                        <div class="my-1 px-1 w-full">
                            <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                                <div class="justify-between p-4"><a href="{{ url('ruang/create') }}">
                                    <button href="" type="button"
                                        class="float-right bg-slate-700 text-white p-2 rounded-md">Tambah
                                    </button></a>
                                </div>
                                <br>
                                    @if (Session::has('success'))
                                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                                        role="alert">
                                        <span class="font-medium">Penambahan berhasil!</span>
                                        {{Session::get('success')}}
                                    </div>
                                    @endif
                                    @if (Session::has('successe'))
                                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                                        role="alert">
                                        <span class="font-medium">Pengubahan dilakukan!</span>
                                        {{Session::get('successe')}}
                                    </div>
                                    @endif
                                    @if (Session::has('successd'))
                                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"
                                        role="alert">
                                        <span class="font-medium">Data dihapus!</span>
                                        {{Session::get('successd')}}
                                    </div>
                                    @endif
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-600">
                                        <thead
                                            class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 rounded-md">
                                            <tr>
                                                <th class="border-collapse border p-2">No</th>
                                                <th class="border-collapse border p-2">Nama Ruangan</th>
                                                <th class="border-collapse border-y border-r-0  p-2">aksi</th>
                                                <th class="border-collapse border-y border-l-0 border-r  p-2"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-300 rounded-md">
                                            <?php $i = $ruang->firstItem() ?>
                                            @foreach ($ruang as $p)
                                            <tr>
                                                <td class="p-2">{{ $i }}</td>
                                                <td class="p-2">{{ $p->nama_ruang }}</td>
                                                <td class="p-2">
                                                    <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')"
                                                        action="{{ url('ruang/'.$p->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" name="submit"
                                                            class="float-right bg-red-500 text-white p-2 rounded-md">Hapus</button>
                                                    </form>
                                                </td>
                                                <td class="p-2">
                                                    <a href="{{ url('ruang/'.$p->id.'/edit') }}"
                                                        class="bg-yellow-500 text-white p-2 rounded-md">Ubah</a>
                                                </td>
                                            </tr>
                                            <?php $i++?>
                                             @endforeach
                                        </tbody>
                                    </table>
                                    {{ $ruang->links('pagination::tailwind') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- content ends -->
        @endsection
