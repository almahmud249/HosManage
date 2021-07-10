<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon.ico') }}">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('dashboard/assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/assets/css/dataTables.bootstrap4.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- alpha/css/bootstrap.css" rel="stylesheet"> -->
    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    @php
        $slg = Auth::user();

    @endphp
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Ego Hospital</span>
                </a>
            </div>
            @php
                 $user = App\Models\User::find(1);
                // $user = Auth::guard('admin');
            @endphp
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">

                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                        @isset($user)
                            <span
                                class="badge badge-pill bg-danger float-right">{{ $user->notifications->count(0) }}</span>
                        @endisset
                    </a>



                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>


                        <div class="drop-scroll">
                            @isset($user)
                                @foreach ($user->notifications as $notification)
                                    <ul class="notification-list mt-12">

                                        <li class="notification-message">
                                            <a href="activities.html">

                                                <div class="media">
                                                    <span class="avatar">
                                                        <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
                                                    </span>



                                                    <div class="media-body">
                                                        @if ($notification->type == 'App\Notifications\NotifyAdmin')
                                                            <p class="noti-time">
                                                                {{ $notification->data['username'] }}<span
                                                                    class="notification-time"></span></p>

                                                            <p class="noti-details"><span class="noti-title"></span>
                                                                Requested new
                                                                Appointment <span class="noti-title"></span></p>
                                                            <p class="noti-time"><span
                                                                    class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                            </p>


                                                        @elseif ($notification->type ==
                                                            'App\Notifications\notifyDoctor')
                                                            <p class="noti-details"><span class="noti-title"></span> added
                                                                new
                                                                doctor <span class="noti-title"></span></p>
                                                            <p class="noti-time">
                                                                {{ $notification->data['username'] }}<span
                                                                    class="notification-time"></span></p>
                                                            <p class="noti-time"><span
                                                                    class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                            </p>



                                                        @else
                                                            <p class="noti-details"><span class="noti-title"></span> added
                                                                new
                                                                patients <span class="noti-title"></span></p>
                                                            <p class="noti-time">
                                                                {{ $notification->data['username'] }}<span
                                                                    class="notification-time"></span></p>
                                                            <p class="noti-time"><span
                                                                    class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                                            </p>
                                                        @endif
                                                    </div>




                                                </div>

                                            </a>
                                        </li>


                                    </ul>
                                @endforeach
                            @endisset
                        </div>

                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        @isset($slg)
                            <span class="user-img">
                                <img class="rounded-circle" src="{{ URL::asset('assets/img') }}/{{ $slg->pic }}"
                                    width="24" alt="Admin">
                                <span class="status online"></span>
                            </span>
                        @else
                            <span class="user-img">
                                <img class="rounded-circle" src="dashboard/boy.png" width="24" alt="Admin">
                                <span class="status online"></span>
                            </span>

                        @endisset

                        @isset($slg)
                            <span>{{ ucwords($slg->name) }}</span>
                        @else
                            <span>Al Mahmud</span>
                        @endisset
                    </a>

                    <div class="dropdown-menu">
                        @isset($slg)
                            <a class="dropdown-item" href="{{ URL::to('admin_profile/' . $slg->slug) }}">Admin
                                Profile</a>
                        @else
                            <a class="dropdown-item" href="{{ URL::to('admin_profile') }}">Admin Profile</a>
                        @endisset
                        <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>







                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="{{ 'home' }}"><i class="fa fa-dashboard"></i>
                                <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="{{ route('all.doc.list') }}"><i class="fa fa-users"></i><span>Doctor
                                </span></a>
                        </li>
                        <li>
                            <a href="{{ route('all.dept.page') }}"><i class="fa fa-user-md"></i>
                                <span>Department</span></a>
                        </li>
                        <li>
                            <a href="{{ route('all.specialist.page') }}"><i class="fa fa-user-md"></i>
                                <span>Specialist</span></a>
                        </li>
                        <li>
                            <a href="{{ route('all.patient.page') }}"><i class="fa fa-wheelchair"></i>
                                <span>Patients</span></a>
                        </li>
                        <li>
                            <a href="{{ route('all.appointment.page') }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                        <li>
                            <a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>Doctor
                                    Schedule</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-hospital-o"></i>
                                <span>Departments</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Inventory </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="employees.html">Testes</a></li>
                                <li><a href="leaves.html">Stocks</a></li>
                                <li class="submenu">
                                    <a href=""><i class="fa fa-user"></i><span>Seat Beds</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="">First Floor</a></li>
                                        <li><a href="">Second Floor</a></li>
                                        <li><a href="">Third Floor</a></li>
                                        <li><a href="">Fourth Floor</a></li>
                                        <li><a href="">Fifth Floor</a></li>
                                    </ul>
                                </li>
                                <li><a href="attendance.html">Branch</a></li>
                                <li>

                                    <a href="attendance.html"><i class="fa fa-user"></i><span>Ambulance</span> <span
                                            class="menu-arrow"></span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href=""><i class="fa fa-user"></i> <span> Employees </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="">Employees List</a></li>
                                <li><a href="leaves.html">Leaves</a></li>
                                <li><a href="holidays.html">Holidays</a></li>
                                <li><a href="attendance.html">Attendance</a></li>
                                <li><a href="">Add Roles</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="invoices.html">Invoices</a></li>
                                <li><a href="payments.html">Payments</a></li>
                                <li><a href="expenses.html">Expenses</a></li>
                                <li><a href="taxes.html">Taxes</a></li>
                                <li><a href="provident-fund.html">Provident Fund</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="salary.html"> Employee Salary </a></li>
                                <li><a href="salary-view.html"> Payslip </a></li>
                            </ul>
                        </li>



                        <li>
                            <a href="activities.html"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="expense-reports.html"> Expense Report </a></li>
                                <li><a href="invoice-reports.html"> Invoice Report </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-cog"></i>
                                <span>Settings</span></a>
                        </li>






                    </ul>
                </div>
            </div>
        </div>

        <div>@yield('content')</div>

    </div>
    </div>
    </div>



    <div class="sidebar-overlay" data-reff=""></div>

    <script src="{{ asset('dashboard/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/chart.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
    //extra




    <script src="{{ asset('dashboard/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

            case 'success':
            toastr.success("{{ Session::get('message') }}");

            break;

            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;

            }
        @endif
    </script>
    {{-- <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true,
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script> --}}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).on('click', '#delete_department', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        window.location.href = link;
                        // swal("Poof! Your imaginary file has been deleted!", {
                        //     window.location.href=link;
                        //   icon: "success",
                        // });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });
    </script>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'

        });
    });
</script>



</body>



</html>
