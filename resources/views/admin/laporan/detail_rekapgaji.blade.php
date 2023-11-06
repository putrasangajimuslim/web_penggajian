@extends('layouts.app')

@section('title')
    {{ __('Halaman List Laporan Rekap Gaji') }} | {{ config('app.name') }}
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Laporan Rekap Gaji</h6>
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
                        <th>Periode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periodes as $periode)
                    <tr>
                        <td>
                            <a href="{{ route('laporan.detail-periode-rekapgaji', ['bln' => $periode->bulan, 'thn' => $periode->tahun]) }}">
                                {{ $periode->bulan }} / {{ $periode->tahun }}
                            </a>
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