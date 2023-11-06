<!DOCTYPE html>
<html>
<head>
    <title>Slip Gaji</title>
    <style>
       .text-slip {
        border: none;
        margin: auto;
        text-align: center;
       }

       .table-income {
        border: 1px solid black;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
    
    <p class="text-slip">PAY SLIP {{ $kelola->bln }} {{ $kelola->tahun}}</p>
    <table>
        <tr>
            <td>Nama</td>
            <td></td>
            <td>:</td>
            <td>{{ $kelola->nama_pegawai}}</td>
        </tr>
        <tr>
            <td>ID Karyawan</td>
            <td></td>
            <td>:</td>
            <td>{{ $kelola->kode_karyawan}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td></td>
            <td>:</td>
            <td>{{ $kelola->jabatan_pegawai}}</td>
        </tr>
    </table>

    <table class="table-income" style="width:100%">
        <tr>
          <th colspan="3" style="border: 1px solid black;">Pendapatan</th>
        </tr>
        <tr>
          <td>Gaji Pokok</td>
          <td>:</td>
          <td>Rp.{{ number_format($kelola->gaji_pokok) }}</td>
        </tr>
        {{-- <tr>
          <td>Uang Makan</td>
          <td>:</td>
          <td>Rp.{{ number_format($kelola->uang_makan) }}</td>
        </tr> --}}
        <tr>
          <td>Bonus</td>
          <td>:</td>
          <td>Rp.{{ number_format($kelola->bonus) }}</td>
        </tr>
        <tr>
          <td>Tunjangan</td>
          <td>:</td>
          <td>Rp.{{ number_format($kelola->tunjangan_transport) }}</td>
        </tr>
        <tr>
          <td>Potongan</td>
          <td>:</td>
          <td>Rp.{{ number_format($kelola->potongan) }}</td>
        </tr>
        <tfoot style="border: 1px solid black;">
          <tr>
            <td>Gaji Bersih</td>
            <td>:</td>
            <td>Rp.{{ number_format($kelola->gaji_bersih) }}</td>
          </tr>
      </table>
</body>
</html>
