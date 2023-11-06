@extends('layouts.app')

@section('title')
    {{ __('Halaman Rekap Gaji Periode') }} | {{ config('app.name') }}
@endsection

@section('content')
<div class="card shadow mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Rekap Gaji Periode {{ $formatBln }} {{ $thn }}</h6>

        <a href="{{ route('laporan.detail-rekapgaji') }}" class="btn btn-outline-info btn-fw"><i class="fas fa-arrow-left mr-2"></i> Back</a>
    </div>
    <div class="card-body">
        <a href="{{ route('laporan.print-detail-periode-rekapgaji', ['bln' => $bln, 'thn' => $thn]) }}" class="btn btn-success btn-fw mb-4">Download <span>pdf</span></a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Karyawan</th>
                        <th>Nama</th>
                        <th>Gaji Pokok</th>
                        <th>Uang Makan</th>
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
                        <td>Rp.{{ number_format($data->uang_makan) }}</td>
                        <td>Rp.{{ number_format($data->bonus) }}</td>
                        <td>Rp.{{ number_format($data->tunjangan_transport) }}</td>
                        <td>Rp.{{ number_format($data->potongan) }}</td>
                        <td>Rp.{{ number_format($data->gaji_bersih) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    </script>
@endsection