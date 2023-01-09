<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

            <div class="user-panel d-flex">
                <div class="image">
                    <img src="{{lbsUploadedAsset((int)auth()->user()->avatar,'thumb')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{route('lbs.profile.user.profile')}}" class="d-block text-uppercase ">{{auth()->user()->display_name}}</a>
                </div>
            </div>
        </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link "  href="{{route('lbs.auth.logout',['guard'=>'admin','redirect'=>'lbs.auth.admin.login'])}}" role="button">
                logout <i class="nav-icon fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
