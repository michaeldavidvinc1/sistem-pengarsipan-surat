<div class="top-header">
    <div class="header-bar d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <a href="#" class="logo-icon me-3">
                <img src="{{ asset('assets/logo.png') }}" height="30" class="small" alt="">
                <span class="big">
                    <img src="{{ asset('assets/logo.png') }}" height="24" class="logo-light-mode" alt="">
                    <img src="{{ asset('assets/logo.png') }}" height="24" class="logo-dark-mode" alt="">
                </span>
            </a>
            <a id="close-sidebar" class="btn btn-icon btn-soft-light" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </div>

        <ul class="list-unstyled mb-0">

            <li class="list-inline-item mb-0 ms-1">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/user.jpg') }}"
                            class="avatar avatar-ex-small rounded" alt=""></button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3"
                        style="min-width: 200px;">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                            <img src="{{ asset('assets/user.jpg') }}"
                                class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 ms-2">
                                <span class="d-block">{{ Auth::user()->petugas->nama_lengkap }}</span>
                                <small class="text-muted">{{ Auth::user()->role }}</small>
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="profile.html"><span class="mb-0 d-inline-block me-1"><i
                                    class="ti ti-settings"></i></span> Profile</a>
                        <a class="dropdown-item text-dark" href="email.html"><span class="mb-0 d-inline-block me-1"><i
                                    class="ti ti-mail"></i></span> Email</a>
                        <div class="dropdown-divider border-top"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-dark"><span
                                    class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span>
                                Logout</button>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
