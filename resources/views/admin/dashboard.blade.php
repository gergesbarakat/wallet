<!DOCTYPE html>
<html>

<x-admin.head>


</x-admin.head>





<title>admin dashboard</title>

<meta name="description" content="">

<meta name="keywords" content="">












</head>


<body>

    <div class="main-wrapper">
        <x-admin.header>

        </x-admin.header>









        <div class="page-wrapper">

            <div class="content container-fluid">



                <!-- Page Header -->

                <div class="page-header">

                    <div class="row">

                        <div class="col-12">

                            <h3 class="page-title">Welcome Admin!</h3>

                        </div>

                    </div>

                </div>

                <!-- /Page Header -->



                <div class="row">

                    <div class="col-xl-3 col-sm-6 col-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="dash-widget-header">

                                    <span class="dash-widget-icon bg-primary">

                                        <i class="far fa-user"></i>

                                    </span>

                                    <div class="dash-widget-info">

                                        <h3>
                                            {{ count(DB::table('users')->where('type', '!=', 'admin')->get('type')->all()) }}
                                        </h3>

                                        <h6 class="text-muted">Users</h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="dash-widget-header">

                                    <span class="dash-widget-icon bg-primary">

                                        <i class="fas fa-user-shield"></i>

                                    </span>

                                    <div class="dash-widget-info">

                                        <h3>

                                            1
                                        </h3>

                                        <h6 class="text-muted">Providers</h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="dash-widget-header">

                                    <span class="dash-widget-icon bg-primary">

                                        <i class="fas fa-qrcode"></i>

                                    </span>

                                    <div class="dash-widget-info">

                                        <h3>

                                            {{ count(DB::table('rooms')->get('name')->all()) }}</h3>

                                        <h6 class="text-muted">Rooms</h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="dash-widget-header">

                                    <span class="dash-widget-icon bg-primary">

                                        <i class="far fa-credit-card"></i>

                                    </span>

                                    <div class="dash-widget-info">

                                        <h3>

                                            $0.00
                                        </h3>

                                        <h6 class="text-muted">Subscription</h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="row">

                    <div class="col-md-6 d-flex">



                        <!-- Recent Bookings -->

                        <div class="card card-table flex-fill">

                            <div class="card-header">

                                <h4 class="card-title">Recent Bookings</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-center">

                                        <thead>

                                            <tr>

                                                <th class="no-sorted">Name</th>

                                                <th class="no-sorted">Booking Date</th>

                                                <th class="no-sorted">Rooms</th>

                                                <th class="no-sorted">Status</th>

                                                <th class="no-sorted">Price</th>

                                            </tr>

                                        </thead>

                                        <tbody>


                                            <tr>

                                                <td colspan="5">

                                                    <div class="text-center text-muted">No records found</div>

                                                </td>

                                            </tr>


                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                        <!-- /Recent Bookings -->



                    </div>

                    <div class="col-md-6 d-flex">


                        <!-- Payments -->

                        <div class="card card-table flex-fill">

                            <div class="card-header">

                                <h4 class="card-title">Payments</h4>

                            </div>

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-center">

                                        <thead>

                                            <tr>

                                                <th class="no-sorted">#</th>

                                                <th class="no-sorted">Booking Date</th>

                                                <th class="no-sorted">Provider</th>

                                                <th class="no-sorted">room</th>

                                                <th class="no-sorted">Amount</th>

                                                <th class="no-sorted">Status</th>

                                            </tr>

                                        </thead>

                                        <tbody>


                                            <tr>
                                                <td colspan="6">
                                                    <div class="text-center text-muted">No records found</div>
                                                </td>
                                            </tr>


                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

















    <x-admin.scripts>

    </x-admin.scripts>


















</body>

</html>
