<!DOCTYPE html>
<html>
<head>
    <title>Slip Gaji</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
       .text-slip {
        border: none;
        margin: auto;
        text-align: center;
       }
    </style>
</head>
<body>
    
    <p class="text-slip">Laporan Rekap Gaji Periode {{ $formatBln }} {{ $thn}}</p>

    <table width="100%">
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Gaji Pokok</th>
                {{-- <th>Uang Makan</th> --}}
                <th>Bonus</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Gaji Bersih</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKelola as $data)
            <tr>
                <td>{{ $data->kode_karyawan }}</td>
                <td>{{ $data->nama_karyawan }}</td>
                <td>Rp.{{ number_format($data->gaji_pokok) }}</td>
                {{-- <td>Rp.{{ number_format($data->uang_makan) }}</td>s --}}
                <td>Rp.{{ number_format($data->bonus) }}</td>
                <td>Rp.{{ number_format($data->tunjangan_transport) }}</td>
                <td>Rp.{{ number_format($data->potongan) }}</td>
                <td>Rp.{{ number_format($data->gaji_bersih) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
