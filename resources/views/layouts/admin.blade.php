<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/datatables.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('assets/admin')}}/images/avatar.png" class="img-fluid">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        <img class="" src="{{asset('assets/admin')}}/images/avatar.png" alt="avatar" />
                        <h5>{{Auth::user()->name}}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="{{url('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                            @if(Auth::user()->role == '1')
                            <li><a href="{{url('dashboard/user')}}"><i class="fas fa-user-circle"></i> Users</a></li>
                            @endif
                            <li><a href="{{url('dashboard/income')}}"><i class="fas fa-wallet"></i> Income</a></li>
                            <li><a href="{{url('dashboard/expense')}}"><i class="fas fa-coins"></i> Expense</a></li>
                            <li><a href="{{url('dashboard/report')}}"><i class="fas fa-file-alt"></i> Reports</a></li>
                            <li><a href="{{url('dashboard/recycle')}}"><i class="fas fa-trash"></i> Recycle Bin</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href="{{ route('dashboard' )}}"><i class=" fas fa-angle-double-right "></i>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2022 | All rights reserved by Dashboard | Development By <a href="#">Creative System Limited.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/admin')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('assets/admin')}}/js/custom.js"></script>
</body>

</html>