<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link ">
        <img src="{{lbsUploadedAsset((int)env('APP_LOGO'),'thumb')}}" alt="{{auth()->user()->display_name}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="/"  class="nav-link active ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="">
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                      {{-- <i class="nav-icon fas fa-setting"></i> --}}
                      <i class=" nav-icon fas fa-cogs"></i>
                      <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('lbs.setting.app.settings')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>system</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('lbs.setting.app.css.settings')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>custom css</p>
                        </a>
                      </li>

                    </ul>
                  </li>

                  <li class="nav-item ">
                    <a href="{{route('lbs.uploads.index')}}"  class="nav-link ">
                        <i class="fas fa-file"></i>
                        <p class="">
                            Media Uploads
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('lbs.role.permission.list')}}"  class="nav-link ">
                        <i class="fas fa-file"></i>
                        <p class="">
                            Authorization
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('lbs.auth.logout',['guard'=>'admin','redirect'=>'lbs.auth.admin.login'])}}" class="nav-link ">
                        <i class=" nav-icon fas fa-sign-out-alt"></i>
                        <p class="">
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
