<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{asset('frontend_admin/css/mdb.min.css')}}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('frontend_admin/css/admin.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
            crossorigin="anonymous"></script>
</head>

<body>
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple active">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Webiste traffic </span>
                </a>
                <a href="{{route('admin.password')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                </a>
                <a href="{{route('admin.orders')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-globe fa-fw me-3"></i><span>International</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-building fa-fw me-3"></i><span>Partners</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                <a href="{{route('admin.users')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Customers</span></a>
                <a href="{{route('admin.sales')}}" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-money-bill fa-fw me-3"></i><span>Sales</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<main style="margin-top: 58px" class="py-4">
    @yield('content')

    <div class="container pt-0">
        <section>
            <div class="card">
                <div class="card-header text-center py-3">
                    <h5 class="mb-10 text-center">
                        <strong style="color: rebeccapurple">Customers</strong>
                    </h5>
                </div>
            </div>
            <br />
        </section>

        <!-- Section: Main chart -->
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Customers for this week</strong></h5>
                </div>
                <div class="card-body">
                    <canvas class="my-4 w-100" id="myChart" height="380"></canvas>
                    <input type="hidden" id="limi" name="myArray" value="[
                    {{$eachDay->Monday}},
                    {{$eachDay->Tuesday}},
                    {{$eachDay->Wednesday}},
                    {{$eachDay->Thursday}},
                    {{$eachDay->Friday}},
                    {{$eachDay->Saturday}},
                    {{$eachDay->Sunday}}
                    ]">
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
        <section>
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success">{{count($users)}}</h3>
                                    <p class="mb-0">All Customers</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-user text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                                <div>
                                    <h3 class="text-success">{{count($lastUsers7)}}</h3>
                                    <p class="mb-0">New Customers</p>
                                </div>
                                <div class="align-self-center">
                                    <i class="far fa-user text-success fa-3x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--Section: Sales Performance KPIs-->
        <section class="mb-4">
            <div class="card">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong>New Customers</strong>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Order</th>
                                <th scope="col">Register</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($lastUsers7 as $userWeek)
                                <tr>
                                    <th scope="row"width="8%">{{$i}}</th>
                                    <td width="15%">
                                  <span class="text-danger">
                                    <i class="fas fa-caret-down me-1"></i><span>{{$userWeek['name']}}</span>
                                  </span>
                                    </td>
                                    <td width="30%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{$userWeek['email']}}</span>
                                  </span>
                                    </td>
                                    <td width="20%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{$userWeek['phone']}}</span>
                                  </span>
                                    </td>
                                    <td width="7%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{0}}</span>
                                  </span>
                                    </td>
                                    <td width="20%">
                                  <span class="text-danger">
                                    <i class="fas fa-caret-down me-1"></i><span>{{$userWeek['created_at']}}</span>
                                  </span>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="card">
                <div class="card-header text-center py-3">
                    <h5 class="mb-0 text-center">
                        <strong>Old Customers</strong>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th scope="col" width="8%"></th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="30%">Email</th>
                                <th scope="col" width="20%">Phone Number</th>
                                <th scope="col" width="7%">Order</th>
                                <th scope="col" width="20%">Register</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($oldUsers as $oldUsers)
                                <tr>
                                    <th scope="row"width="8%">{{$i}}</th>
                                    <td width="15%">
                                  <span class="text-danger">
                                    <i class="fas fa-caret-down me-1"></i><span>{{$oldUsers['name']}}</span>
                                  </span>
                                    </td>
                                    <td width="30%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{$oldUsers['email']}}</span>
                                  </span>
                                    </td>
                                    <td width="20%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{$oldUsers['phone']}}</span>
                                  </span>
                                    </td>
                                    <td width="7%">
                                  <span class="text-success">
                                    <i class="fas fa-caret-up me-1"></i><span>{{0}}</span>
                                  </span>
                                    </td>
                                    <td width="20%">
                                  <span class="text-danger">
                                    <i class="fas fa-caret-down me-1"></i><span>{{$oldUsers['created_at']}}</span>
                                  </span>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>



    </div>
</main>
<!--Main layout-->
<!-- MDB -->
<script type="text/javascript" src="{{asset('frontend_admin/js/mdb.min.js')}}"></script>
<!-- Custom scripts -->
<script type="text/javascript" src="{{asset('frontend_admin/js/admin.js')}}"></script>

</body>

</html>
