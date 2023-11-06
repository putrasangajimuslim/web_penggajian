@extends('layouts.app')

@section('title')
    {{ __('Halaman Edit Kelola Gaji') }} | {{ config('app.name') }}
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
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Kelola Gaji</h6>

                <a href="{{ route('kelolagaji.index') }}" class="btn btn-outline-info btn-fw"><i class="fas fa-arrow-left mr-2"></i> Back</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('kelolagaji.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="InputKodeKar">Kode Karyawan </label>
                        <input type="hidden" value="{{ $kelolagaji->id }}" name="id_kelola">
                        <input type="text" name="kode_karwan" value="{{ $kelolagaji->kode_karyawan }}" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label for="InputBonus">Bonus </label>
                        <input type="number" class="form-control" id="InputBonus" name="bonus" value="{{ old('bonus') }}">
                    </div>
                    <button class="btn btn-success btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection