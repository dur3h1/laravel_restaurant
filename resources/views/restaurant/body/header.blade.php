<header id="page-topbar" style="background-color: #FFB443">
    <div class="navbar-header">

                <div class="d-flex">


                </div>

                @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
                @endphp
                <div id="container-user" style="background-color: #FFC671;">
                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="https://www.macmillandictionary.com/external/slideshow/full/White_full.png"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                </div>

    </div>
</header>
