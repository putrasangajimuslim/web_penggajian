@extends('layouts.app')

@section('title')
    {{ __('Halaman List Laporan Slip Gaji') }} | {{ config('app.name') }}
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Laporan Slip Gaji</h6>
    </div>
    <div class="card-body">
        
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        @if ($isAdminAccess)
                            <th>ID Karyawan</th>
                        @endif
                        <th>Periode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slipgajis as $slipgaji)
                    <tr>
                        @if ($isAdminAccess)
                            <td>{{ $slipgaji->kode_karyawan }}</td>
                        @endif
                        <td>{{ $slipgaji->bulan }} / {{ $slipgaji->tahun }}</td>
                        <td>
                            <a href="{{ route('laporan.print', ['id' => $slipgaji->id]) }} " target="_blank" class="btn btn-success">Print</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
    @include('admin.modal.destroy')
    <script>
    </script>
@endsection