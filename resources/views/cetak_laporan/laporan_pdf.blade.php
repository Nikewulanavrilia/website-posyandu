<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }
    </style>
</head>
<body>
    <div class = "rangkasurat">
        <table width = "100%">
            <tr>
                <td class="tengah">
                    <h2>PEMERINTAH KABUPATEN SITUBONDO</h2>
                    <h2>DINAS KESEHATAN</h2>
                    <h2>POSYANDU KAMPUNG GUDANG</h2>
                    <b>Gudang, Mlandingan Kulon, Kec. Mlandingan Telp . ( 0262 ) 428590 Situbondo 68353</b>
                </td>
            </tr>
        </table>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>TB (cm)</th>
                <th>BB (kg)</th>
                <th>Umur Anak</th>
                <th>Tanggal Posyandu</th>
                <th>Vaksin</th>
            </tr>
        </thead>
        <tbody>
            @php
                $groupedData = $data_posyandu->groupBy('tanggal_posyandu');
            @endphp
            @foreach ($groupedData as $date => $group)
                @foreach ($group->groupBy('nama_anak') as $nama_anak => $items)
                    <tr>
                        <td rowspan="{{ $items->count() }}">{{ $nama_anak }}</td>
                        <td rowspan="{{ $items->count() }}">{{ $items->first()->tb_anak }}</td>
                        <td rowspan="{{ $items->count() }}">{{ $items->first()->bb_anak }}</td>
                        <td rowspan="{{ $items->count() }}">{{ $items->first()->umur_anak }}</td>
                        <td rowspan="{{ $items->count() }}">{{ \Carbon\Carbon::parse($items->first()->tanggal_posyandu)->format('d-m-Y') }}</td>
                        <td>{{ $items->first()->nama_vaksin }}</td>
                    </tr>
                    @foreach ($items->skip(1) as $item)
                        <tr>
                            <td>{{ $item->nama_vaksin }}</td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>