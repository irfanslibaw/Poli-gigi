@extends('sidebar')

@section('content')

<!-- content -->
<div class="flex-1 p-10">
  <nav class="rounded-md px-6 py-4 w-full">
    <ol class="list-reset float-right font-semibold hidden sm:flex">
      <li><a href="#" class="text-gray-800 hover:text-gray-900">Report</a></li>
      <li><span class="text-gray-700 mx-2">/</span></li>
      <li><a href="#" class="text-gray-800 hover:text-gray-900">Rujukan Pasien</a></li>
    </ol>
    <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">SURAT RUJUKAN</h3>
  </nav>

  <div class="h-screen max-w-7xl">
    <section class="flex items-center text-gray-600">
      <div class="container px-5 py-5 mx-auto">
        <div class="my-1 px-1 w-full">
          <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
            <div class="justify-between p-4">
                <a href="{{ url('rujukan/create') }}" >
                <button type="button"
                    class="float-right bg-slate-700 text-white p-2 rounded-md">Tambah
                </button></a>
              <!-- url form untuk search -->
              <form action="{{ url('rujukan') }}" method="get" class="hidden sm:flex">
                <input type="search" name="katakunci" value="{{ Request::get ('katakunci') }}"
                  placeholder="Cari di sini" aria-label="search" class="rounded pl-2">
                <button class="p-2 px-6 ml-4 bg-slate-600 text-white rounded-md" type="submit">Cari</button>
              </form>
            </div>
            <br>
            @if (Session::has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                role="alert">
                <span class="font-medium">Penambahan berhasil!</span>
                {{Session::get('success')}}
            </div>
            @endif
            @if (Session::has('successd'))
            <div class="p-4 mb-4 text-sm text-red-500 rounded-lg bg-blue-50"
                role="alert">
                <span class="font-medium">Data dihapus!</span>
                {{Session::get('successd')}}
            </div>
            @endif
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-800 uppercase bg-gray-50">
                  <tr>
                    <th class="border border-collapse p-2">No</th>
                    <th class="border border-collapse p-2">Nama</th>
                    <th class="border border-collapse p-2">Tanggal</th>
                    <th class="border border-collapse p-2">Tujuan</th>
                    <th class="border border-collapse border-y border-r-0  p-2">Detail</th>
                    <th class="border border-collapse border-y border-l-0 border-r  p-2"></th>
                    <th class="border border-collapse border-y border-l-0 border-r  p-2"></th>
                  </tr>
                </thead>
                <tbody class="bg-gray-300 rounded-md">
                  <?php $i = $rujukan->firstItem() ?>
                  @foreach ($rujukan as $p)
                  <tr>
                    <td class="p-2">{{ $i }}</td>
                    <td class="p-2">{{ $p->pasien->nama }}</td>
                    <td class="p-2">{{ $p->tanggal }}</td>
                    <td class="p-2">{{ $p->rs_tujuan }}</td>
                    <td class="p-2 "><a
                        href="{{ url('rujukan/'.$p->id.'/detail') }}">
                        <button class="px-4 py-2 bg-gray-700 text-white rounded-lg"> Info </button>
                    </td></a>

                    <td class="p-2"><a href="{{ url('rujukan/'.$p->id.'/print') }}"><button
                        class="px-4 py-2 bg-blue-700 text-white rounded-lg"> Cetak </button></a>

                    </td>
                    <td>
                        <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" action="{{ url('rujukan/'.$p->id) }}" method="post">
                            @csrf

                            @method('DELETE')
                            <button type="submit" name="submit" class="float-right bg-red-500 text-white p-2 rounded-md">Hapus</button>
                        </form>
                    </td>

                  </tr>
                  <?php $i++?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</div>

@endsection
