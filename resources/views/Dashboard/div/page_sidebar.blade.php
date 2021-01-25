<div class="page-sidebar toggled sidebar">
    <nav class="sidebar-collapse d-none d-md-block">
        <i class="ion ion-ios-arrow-back show-on-collapsed" style="float: right"></i>
        <i class="ion ion-ios-arrow-forward hide-on-collapsed" style="float: left;"></i>
    </nav>

    <ul class="nav nav-pills nav-stacked" id="sidebar-stacked">
        <li class="d-md-none">
            <a href="#" class="sidebar-close"><i class="ion ion-ios-arrow-left"></i></a>
        </li>


        <li class="nav-item {{ Route::current()->getName() == 'dashboard.home' ? "active" : "" }}">
            <a class="nav-link" href="{{ route('dashboard.home') }}">
                <i class="ion ion-ios-home"></i>
                <span class="nav-text">صفحه اصلی</span>
            </a>
        </li>




        @can('article')
            <li class="nav-item {{ starts_with(Route::current()->getName(), 'dashboard.article') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('dashboard.article.index') }}">
                    <i class="ion  ion-compose"></i>
                    <span class="nav-text">تاپیک</span>
                </a>
            </li>
        @endcan




        @can('user-update')
            <li class="nav-item {{ starts_with(Route::current()->getName(), 'dashboard.user') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('dashboard.user.index') }}">
                    <i class="ion  ion-compose"></i>
                    <span class="nav-text">کاربر</span>
                </a>
            </li>
        @endcan



        @can('comment-update')
            <li class="nav-item {{ starts_with(Route::current()->getName(), 'dashboard.comment') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('dashboard.comment.index') }}">
                    <i class="ion  ion-compose"></i>
                    <span class="nav-text">کامنت</span>
                </a>
            </li>
        @endcan


        @if(auth()->user()->isSuperAdmin())
            <li class="nav-item {{ starts_with(Route::current()->getName(), 'dashboard.permission') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('dashboard.permission.index') }}">
                    <i class="fa fa-lock"></i>
                    <span class="nav-text">دسترسی</span>
                </a>
            </li>


            <li class="nav-item {{ starts_with(Route::current()->getName(), 'dashboard.role') ? "active" : "" }}">
                <a class="nav-link" href="{{ route('dashboard.role.index') }}">
                    <i class="fa fa-unlock-alt"></i>
                    <span class="nav-text">نقش</span>
                </a>
            </li>
        @endif


    </ul>
</div>