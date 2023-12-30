<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <div style="margin-left: 24px; display: flex;">
        <p style="font-size: 20px; margin: auto 20px">Sistem Penggajian Notaris Indah Khairunisa</p>
        <img src="{{ asset('img/garuda.jpg') }}" style="width: 40px;">
    </div>    

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        @php
            $isLogin = Auth::guard('karyawan')->user();
        @endphp

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $isLogin->nama }}</span>
                <img class="img-profile rounded-circle"
                    src="{{ asset('img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
               
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>