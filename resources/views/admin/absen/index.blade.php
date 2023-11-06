@extends('layouts.app')

@section('title')
    {{ __('Halaman Kehadiran') }} | {{ config('app.name') }}
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kehadiran</h6>
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


        @if ($isAdminAccess)
            <a href="{{ route('kehadiran.create') }}" class="btn btn-outline-success btn-fw mb-4">Tambah Kehadiran</a>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Karyawan</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Keterangan</th>
                        @if ($isAdminAccess)
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kehadirans as $kehadiran)
                    <tr>
                        <td>{{ $kehadiran->kode_karyawan }}</td>
                        <td>{{ $kehadiran->tgl }}</td>
                        <td>{{ $kehadiran->jam_masuk }}</td>
                        <td>{{ $kehadiran->jam_keluar }}</td>
                        <td>{{ $kehadiran->keterangan }}</td>
                        @if ($isAdminAccess)
                            <td>
                                <a href="{{ route('kehadiran.edit', ['id'=> $kehadiran->id]) }}"  class="btn btn-primary" id="btnEdit">Edit</a>

                                {{-- <form id="hapus-form" action="{{ route('rekam-kehadiran') }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    <input type="text" class="form-control" id="replace_kode_karyawan_clock_out" name="replace_kode_karyawan">
                                    <input type="text" class="form-control" id="type_rekam" name="type_rekam" value="clock_out">
                                </form>
                                <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('hapus-form').submit();" id="btnEdit"><i class="fas fa-trash"></i></button> --}}
                                <button class="btn btn-danger btnDel" id="btnEdit" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('kehadiran.destroy', ['id' => $kehadiran->id]) }}"><i class="fas fa-trash"></i></button>

                            </td>
                        @endif
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