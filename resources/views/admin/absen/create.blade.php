@extends('layouts.app')

@section('title')
    {{ __('Halaman Tambah Kehadiran') }} | {{ config('app.name') }}
@endsection

@section('content')

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

<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kehadiran</h6>

                <a href="{{ route('kehadiran.index') }}" class="btn btn-outline-info btn-fw"><i class="fas fa-arrow-left mr-2"></i> Back</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('kehadiran.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="InputKodeKar">Kode Karyawan <span style="color: red">*</span></label>
                        <select name="kode_karyawan" id="InputKodeKar" class="form-control">
                            <option value="">--Please Select Kode Karyawan Atau Nama</option>
                            @foreach ($kodekaryawans as $kodekaryawan)
                                @if (old('kode_karyawan') === $kodekaryawan->kode_karyawan)
                                    <option value="{{ $kodekaryawan->kode_karyawan }}" selected>{{ $kodekaryawan->kode_karyawan }} - {{ $kodekaryawan->nama }}</option>
                                @else
                                    <option value="{{ $kodekaryawan->kode_karyawan }}">{{ $kodekaryawan->kode_karyawan }} - {{ $kodekaryawan->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kode_karyawan')
                            <span style="color: red;">Silahkan Pilih Kode Karyawan</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputJamMasuk">Jam Masuk </label>
                        <input type="datetime-local" class="form-control" id="InputJamMasuk" name="jam_masuk" value="{{ old('jam_masuk') }}">
                        @error('jam_masuk')
                            <span style="color: red;">Silahkan Isi Jam Masuk</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputJamKeluar">Jam Keluar</label>
                        <input type="datetime-local" class="form-control" id="InputJamKeluar" name="jam_keluar" value="{{ old('jam_keluar') }}">
                        @error('jam_keluar')
                            <span style="color: red;">Silahkan Isi Jam Keluar</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="InputKet">Keterangan</label>
                        <textarea name="keterangan" id="InputKet" cols="20" rows="10" class="form-control">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <span style="color: red;">Silahkan Isi Keterangan</span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="InputKet">Keterangan</label>
                        <select name="keterangan" id="InputKet" class="form-control">
                            <option value="">--Please Select Keterangan--</option>
                            <option value="alfa">Alfa</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                        </select>
                        @error('keterangan')
                            <span style="color: red;">Silahkan Pilih keterangan</span>
                        @enderror
                    </div>
                    
                    <button class="btn btn-success btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection