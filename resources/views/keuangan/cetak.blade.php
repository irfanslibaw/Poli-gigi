<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Keuangan</title>
    <style>

        * {
        font-family: Arial, Helvetica, sans-serif;
        }

        div {
            position: relative;
            overflow-x: auto;
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
    <h2>Keuangan  Tahunan</h2>
    <p>Klinik Poli Teknik Gigi || Jl. abc kec. abc, provinsi abc 12345</p>
    <div class="div">
        <table>
            <thead>
                <tr>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Pemasukan</th>
                </tr>
            </thead>
        <tbody>
        @foreach($results as $data)
            <tr class="tr1">
                <th scope="row" class="th1">{{ Carbon\Carbon::createFromDate(null, $data->bulan, null)->formatLocalized('%B') }}</td>
                <th scope="row">{{ $data->tahun }}</td>
                <th scope="row">{{ number_format($data->auu, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <br>
        <p>Pastikan data sesuai dengan apa adanya. Gunakan data ini dengan baik dan jangan sampai disalahgunakan oleh orang yang tidak bertanggung jawab.</p>
    </div>

</body>
</html>
