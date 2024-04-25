<!DOCTYPE html>
<html>
<head>
    <title>Surat Rujukan</title>
    <style>

        * {
        font-family: Helvetica, Helvetica, sans-serif;
    }

        .mid {
            display: flex;
            justify-content: center;
        }
        .medium {
            font-weight: 500;
        }
        .right {
            float: right;
        }
        .ml {
            margin-left: 10px;
        }

        div {
            position: relative;
        }

        .hel {
            font-family: "Helvetica";
        }
        table {
            width: 100%;
            font-size: small;
            text-align: left;
            color: #6b7280;
        }

        thead {
            font-size: smaller;
            color: #374151;
            background-color: #f9fafb;
            text-transform: uppercase;

        }

        th {
            padding: 0.75rem 1.5 rem;
        }

        .tr1 {
            background-color: white;
            border-bottom-width: 1px;
        }

        .th1 {
            padding: 0.75rem 1.75 rem;
            font-weight: 500;
            color: #111827;
            white-space: nowrap;

        }
    </style>
</head>
<body>
    <br>
    <h2 class="mid">SURAT RUJUKAN</h2>
    <p class="mid medium hel" >Klinik Poli Gigi Jl.xxx No.x 12345</p>
    <br>

    <p class="right">Tanggal: {{ $rujukan->tanggal }}</p>
    <br>
    <br>

    <p class="mid">Dengan hormat kami. Dalam rangka mendapatkan pelayanan kesehatan yang lebih optimal,<br>
                    kami memberikan surat rujukan pada pasien kami dengan data sebagai berikut:</p>

         <br>

         <table>
            <thead>
                <tr>
                    <th scope="col">Rumah Sakit Tujuan</th>
                    <th scope="col">Dokter Perujuk</th>
                    <th scope="col">Dokter Tujuan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr1">
                    <th scope="row" class="th1">{{ $rujukan->rs_tujuan }}</th>
                    <th scope="row">{{ $rujukan->dokter->nama }}</th>
                    <th scope="row">{{ $rujukan->dr_tujuan }}</th>
                </tr>
            </tbody>
         </table>

         <br>

        <table>
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr1">
                    <th scope="row" class="th1">{{ $rujukan->pasien->nama }}</th>
                    <th scope="row"> @if ($rujukan->pasien->jenis_kelamin == "L")
                        Laki-laki
                    @else
                        Perempuan
                    @endif</th>
                    <th scope="row">{{ $rujukan->umur }} Tahun</th>
                    <th scope="row">{{ $rujukan->alamat }}</th>
                    <th scope="row">{{ $rujukan->no_hp }}</th>
                </tr>
            </tbody>
        </table>

        <br>

        <table>
            <thead>
                <tr>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Diagnosa Sementara</th>
                    <th scope="col">Tindakan Sementara</th>
                </tr>
            </thead>
            <tbody>
                <tr class="tr1">
                    <th scope="row" class="th1">{{ $rujukan->keluhan }}</th>
                    <th scope="row">{{ $rujukan->diagnosa }}</th>
                    <th scope="row">{{ $rujukan->terapi}}</th>
                </tr>
            </tbody>
        </table>

    <br>

    <p class="mid">Untuk itu, kami mohon bantuan dokter untuk memberikan pelayanan kesehatan<br>
                yang lebih lanjut pada pasien tersebut. Demikian surat rujukan ini kami sampaikan.</p>
    <br>
    <h5>Hormat Kami,</h5>
    <br>
    <br>
    <br>
    <h5>Klinik Gigi</h5>
    <br>
</body>
</html>
