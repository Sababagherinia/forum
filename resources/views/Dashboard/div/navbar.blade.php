<nav class="navbar navbar-spark navbar-toggleable navbar-expand-md">
    <div class="container-fluid">
        <button type="button" class="sidebar-open d-md-none">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand d-none d-md-inline-block" href="index-2.html">
            <i class="ion ion-ios-pulse-strong" aria-hidden="true"></i>
        </a>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">Profile</a>
                <ul class="dropdown-menu">

                    <li>
                        {{--<a class="dropdown-item"
                           href="{{ route('panel.user.edit' , ['slug' => auth()->user()->slug]) }}">
                            <i  class="ion ion-gear-b"></i> تنظیمات</a>--}}
                    </li>
                    <li role="separator" class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"><i class="ion ion-log-out"></i> خروج</a>
                </ul>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="#" class="nav-link">--}}
{{--                    <img src="{{ URL::asset(auth()->user()->image['thumbnail']) }}" alt="Avatar" width="48" height="48"--}}
{{--                         class="avatar img-circle"/>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</nav>
