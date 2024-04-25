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
        <section class="flex items-center">
          <div class="container px-5 py-5 mx-auto">
            <div class="my-1 px-1 w-full">
              <br>
              <div class="overflow-hidden rounded-lg shadow-md p-3 bg-slate-200 tracking-wide space-y-2">
                <h2 class="flex justify-center font-semibold text-lg">CETAK KEUANGAN</h2>
                <h4 class="flex justify-center text-md capitalize">Pilih tahun untuk mencetak laporan</h4>
                <br>
                <div class="text-center pt-4">
                  <select name="" id="" class="px-8 py-1 rounded-md border-2 border-collapse border-black">
                    <option value="">2023</option>
                    <option value="">2024</option>
                    <option value="">2025</option>
                    <option value="">2026</option>
                  </select>
                </div>
                <br>
                <div class="flex justify-center">
                  <button href="{{ url('') }}" type="button"
                    class="px-10 py-2 bg-slate-700 text-white rounded-md">CETAK</button>
                </div>
                <br>
              </div>
            </div>

          </div>
        </section>
      </div>
    </div>
    <!-- content ends -->

@endsection
