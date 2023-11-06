@extends('layouts.master')

@section('style')
    <style>
        .bg-custom-default {
            background-color: #F5F8FF
        }

        .auth .auth-form-light {
            background: #ffffff;
        }
    </style>
@endsection

@section('body')
<body class="bg-custom-default">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5 mt-4">
                            <div class="brand-logo">
                                <img src="{{ asset('img/garuda.jpg') }}" alt="logo">
                            </div>

                            <div class="mt-4">
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
                            </div>

                            <form class="pt-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="kode_karyawan">Username <span style="color: red;">*</span></label>
                                  <input type="text" class="form-control" id="kode_karyawan" name="kode_karyawan" placeholder="Username">
                                  @error('kode_karyawan')
                                     <span style="color: red;">Silahkan Isi Username</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="password">Password <span style="color: red;">*</span></label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                  @error('password')
                                      <span style="color: red;">Silahkan Isi Password</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="role">Role <span style="color: red;">*</span></label>
                                  <select name="role" id="role" class="form-control">
                                    <option value="">--Please Select Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                  </select>
                                  @error('role')
                                      <span style="color: red;">Silahkan Pilih Role</span>
                                  @enderror
                                </div>
                                <div class="mt-3">
                                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                </div>
                              </form>

                              <div class="mt-4 d-flex justify-content-between">
                                <form id="rekam-kehadiran-clock-in" action="{{ route('rekam-kehadiran') }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    <input type="text" class="form-control" id="replace_kode_karyawan_clock_in" name="replace_kode_karyawan">
                                    <input type="text" class="form-control" id="type_rekam" name="type_rekam" value="clock_in">
                                </form>
                
                                <form id="rekam-kehadiran-clock-out" action="{{ route('rekam-kehadiran') }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    <input type="text" class="form-control" id="replace_kode_karyawan_clock_out" name="replace_kode_karyawan">
                                    <input type="text" class="form-control" id="type_rekam" name="type_rekam" value="clock_out">
                                </form>
                
                                {{-- <a href="#" class="btn btn-success" id="btnClockIn"
                                    onclick="event.preventDefault(); document.getElementById('rekam-kehadiran').submit();" disabled>
                                    {{ __('Clock In') }}
                                </a> --}}
                                <button class="btn btn-success" onclick="event.preventDefault(); document.getElementById('rekam-kehadiran-clock-in').submit();" id="btnClockIn" disabled>Clock In</button>
                                <button class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('rekam-kehadiran-clock-out').submit();" id="btnClockOut" disabled>Clock Out</button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    @include('layouts.inc.script')
    <script>
        $(document).ready(function() {
            
            $('#kode_karyawan').on('input', function() {
                var nikValue = $(this).val(); // Mengambil nilai dari input "nik"
                var btnClockIn = $('#btnClockIn'); // Tombol "Clock In"
                var btnClockOut = $('#btnClockOut'); // Tombol "Clock Out"
                var csrfToken = $('meta[name="csrf-token"]').attr('content');


                if (isValidNIK(nikValue)) {
                    $.ajax({
                            url: "{{ route('cek-kehadiran')}}",
                            type: 'POST',
                            data: {'kode_karyawan': nikValue},
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(res) {
                                if(res.cek_absen_masuk) {
                                    btnClockIn.removeAttr('disabled');
                                    $("#replace_kode_karyawan_clock_in").val(nikValue);
                                    $("#replace_kode_karyawan_clock_out").val(nikValue);
                                }

                                if (res.cek_absen_keluar) {
                                    btnClockOut.removeAttr('disabled');
                                    $("#replace_kode_karyawan_clock_in").val(nikValue);
                                    $("#replace_kode_karyawan_clock_out").val(nikValue);
                                }
                            }
                    });
                } else {
                    btnClockIn.attr('disabled', 'disabled');
                    btnClockOut.attr('disabled', 'disabled');
                }
            });

            function isValidNIK(nik) {
                // Lakukan pemeriksaan apakah NIK sesuai dengan format yang diinginkan
                var nikPattern = /^\d{1,}$/; // Format 8 digit
                return nikPattern.test(nik);
            }
        });
      </script>
</body>
@endsection