@extends('sidebar')

@section('content')

<!-- content -->
<div class="flex-1 p-10">
  <nav class="rounded-md px-6 py-4 w-full">
    <ol class="list-reset float-right font-semibold hidden sm:flex">
      <li><a href="#" class="text-gray-800 hover:text-gray-900">Transaksi</a></li>
      <li><span class="text-gray-700 mx-2">/</span></li>
      <li><a href="#" class="text-gray-800 hover:text-gray-900">Tagihan Pasien</a></li>
    </ol>
    <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">TAGIHAN PASIEN</h3>
  </nav>

  <div class="h-screen max-w-7xl">
    <section class="flex items-center text-gray-600">
      <div class="container px-5 py-5 mx-auto">
        <div class="my-1 px-1 w-full">
          <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
            <div class="justify-between p-4">
              <!-- url form untuk search -->
              <form action="{{ url('tagihan') }}" method="get" class="hidden sm:flex">
                <input type="search" name="katakunci" value="{{ Request::get ('katakunci') }}"
                  placeholder="Cari di sini" aria-label="search" class="rounded pl-2">
                <button class="p-2 px-6 ml-4 bg-slate-600 text-white rounded-md" type="submit">Cari</button>
              </form>
            </div>
            <br>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-800 uppercase bg-gray-50">
                  <tr>
                    <th class="border border-collapse p-2">No</th>
                    <th class="border border-collapse p-2">Nama</th>
                    <th class="border border-collapse p-2">Tanggal</th>
                    <th class="border border-collapse p-2">Status</th>
                    <th class="border border-collapse border-y border-r-0  p-2">Detail</th>
                  </tr>
                </thead>
                <tbody class="bg-gray-300 rounded-md">
                  <?php $i = $pemesanan->firstItem() ?>
                  @foreach ($pemesanan as $p)
                  <tr>
                    <td class="p-2">{{ $i }}</td>
                    <td class="p-2">{{ $p->pasien->nama }}</td>
                    <td class="p-2">{{ $p->tanggal }}</td>
                    <td class="p-2">@if ($p->status == "S")
                      Sudah
                      @else
                      Belum
                      @endif
                    </td>
                    <td class="p-2 "><a
                        href="{{ url('tagihan/'.$p->id.'/info') }}">
                        <button class="px-4 py-2 bg-gray-700 text-white rounded-lg"> info </button>
                    </td></a>

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
