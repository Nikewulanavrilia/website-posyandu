<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo-mini.png') }}" id="brand-logo-mini" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <p class="mb-0 navbar-profile-name">{{ Auth::user()->name }}</p>
                        <i class="mdi mdi-menu-down"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list rounded"
                    aria-labelledby="profileDropdown">
                    <a href="#" class="dropdown-item preview-item" onclick="event.preventDefault(); confirmLogout();">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-blue rounded-circle">
                                <i class="mdi mdi-logout text-light"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1 text-black">Log out</p>
                        </div>
                    </a>                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>

<script>
    // Fungsi untuk menampilkan pesan konfirmasi saat logout
    function confirmLogout() {
        Swal.fire({
            text: 'Apakah Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna menekan tombol "Ya, Logout", kirimkan form logout
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>