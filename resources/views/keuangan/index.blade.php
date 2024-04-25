@extends('sidebar')

@section('content')
    <!-- content -->
    <div class="flex-1 p-10">
      <nav class="rounded-md px-6 py-4 w-full">
        <ol class="list-reset float-right font-semibold hidden sm:flex">
          <li><a href="#" class="text-gray-800 hover:text-gray-900">Report</a></li>
          <li><span class="text-gray-700 mx-2">/</span></li>
          <li><a href="#" class="text-gray-800 hover:text-gray-900">Keuangan</a></li>
        </ol>
        <h3 class="font-bold text-lg text-white tracking-wider lg:p-auto">KEUANGAN</h3>
      </nav>

      <div class="h-screen">
        <section class="flex items-center text-gray-600">
          <div class="container px-5 py-5 mx-auto">
            <div class="my-1 px-1 w-full">
              <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                <div class="justify-between p-4">
                    <h1 class="text-2xl font-semibold">Keuangan Klinik</h1>
                    <h2 class="text-md">Jangan lupa untuk selalu mencetak data keuangan di penghujung tahun.</h2>
                </div>
                <br>
                <div class="overflow-x-auto">
                  <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700">
                      <tr>
                        <th class="border border-collapse p-2">Bulan</th>
                        <th class="border border-collapse p-2">Tahun</th>
                        <th class="border border-collapse p-2">Pemasukan</th>
                      </tr>
                    </thead>
                    <tbody class="bg-gray-300 rounded-md">
                    @foreach($results as $data)
                        <tr>
                            <td class="p-2">{{ Carbon\Carbon::createFromDate(null, $data->bulan, null)->formatLocalized('%B') }}</td>
                            <td class="p-2">{{ $data->tahun }}</td>
                            <td class="p-2">{{ number_format($data->auu, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <br>
                    <!-- button cetak laporan -->
                    <a class="flex justify-center" href="{{ url('keuangan/cetak') }}">
                    <button href="" type="button"
                        class="w-9/12 bg-slate-700 text-white p-2 rounded-md text-md">Cetak laporan</button></a>

                </div>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>
    <!-- content ends -->
@endsection
