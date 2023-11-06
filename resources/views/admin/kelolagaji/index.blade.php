@extends('layouts.app')

@section('title')
    {{ __('Halaman Kelola Gaji') }} | {{ config('app.name') }}
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kelola Gaji</h6>
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
                        <th>ID Karyawan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah Hadir</th>
                        <th>Jumlah Tidak Hadir</th>
                        <th>Gaji Pokok</th>
                        {{-- <th>Uang Makan</th> --}}
                        <th>Bonus</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Gaji Bersih</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelolagajis as $kelolagaji)
                    <tr>
                        <td>{{ $kelolagaji->kode_karyawan }}</td>
                        <td>{{ $kelolagaji->bulan }}</td>
                        <td>{{ $kelolagaji->tahun }}</td>
                        <td>{{ $kelolagaji->jml_kehadiran }}</td>
                        <td>{{ $kelolagaji->jml_alfa }}</td>
                        <td>Rp. {{ number_format($kelolagaji->gaji_pokok) }}</td>
                        {{-- <td>Rp. {{ number_format($kelolagaji->uang_makan) }}</td> --}}
                        <td>Rp. {{ number_format($kelolagaji->bonus) }}</td>
                        <td>Rp. {{ number_format($kelolagaji->tunjangan_transport) }}</td>
                        <td>Rp. {{ number_format($kelolagaji->potongan) }}</td>
                        <td>Rp. {{ number_format($kelolagaji->gaji_bersih) }}</td>
                        <td>
                            <a href="{{ route('kelolagaji.edit', ['id'=> $kelolagaji->id]) }}"  class="btn btn-primary" id="btnEdit">Edit</a>

                            <button class="btn btn-danger btnDel" id="btnEdit" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('kelolagaji.destroy', ['id' => $kelolagaji->id]) }}"><i class="fas fa-trash"></i></button>
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
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var url = button.data('url'); // Ambil nilai data-url dari tombol
            var form = $(this).find('form'); // Temukan elemen form di dalam modal
            form.attr('action', url);
        });
    </script>
@endsection