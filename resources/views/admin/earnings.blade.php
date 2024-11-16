<!DOCTYPE html>
<?php
use App\models\User;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin users</title>

<meta charset="utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<meta name="description" content="">

<meta name="keywords" content="">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/logo/favicon.png') }}">











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
                        <div class="col">
                            <h3 class="page-title">Earnings</h3>
                        </div>
                        <div class="col-auto text-right">
                            <a href="{{ route('users.show','1') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-sync"></i></a>
                            <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                                <i class="fas fa-filter"></i>
                            </a>
                            <a href="{{ route('users.create') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data"
                    id="filter_inputs">
                    @csrf
                    <div class="card filter-card">
                        <div class="card-body pb-0">
                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="user_category">
                                            <option value="">Select category</option>
                                            <option value="1">cat1</option>
                                            <option value="2">jhgkj</option>
                                            <option value="4">jglhhbkjj</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="subcategory" id="user_subcategory">
                                            <option value="">Select subcategory</option>
                                            <option value="1">cat1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>user Title</label>
                                        <select class="form-control" name="user_title" id="user_title">
                                            <option value="">Select user</option>
                                            <option value="1">user SCAN DEVICE </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control start_date" type="text" name="from">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control end_date" type="text" name="to">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" name="form_submit" value="submit"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0 service_table">
                                        <?php
                                        $appointments = DB::table('appointments')->get()->all();

                                        ?>

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Room </th>

                                                <th>User</th>
                                                <th>Payment</th>

                                                <th>Type</th>
                                                <th>Room Price</th>

                                                <th>Amount Paid</th>
                                                <th>Comission</th>
                                                <th>Earned Amount</th>
                                                <th>Date</th>
                                                <th>hour</th>

                                                <th>Date created</th>
                                                <th>Date updated</th>

                                             </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <?php
                                                $customer = DB::table('customers')->where('id' ,$appointment->customer_id)->get()[0];
                                                $user =  DB::table('users')->find($appointment->user_id);
                                                $room = DB::table('rooms')->find($appointment->room_id)
                                                ?>
                                                <tr>
                                                    <td> {{$appointment->id}} </td>
                                                    <td> {{$room->name}} </td>
                                                    <td> {{$user->email}} </td>


                                                    <td>{{ $appointment->type }}</td>
                                                    <td>{{ $appointment->payment }}</td>
                                                    <td>{{ $room->price }}</td>

                                                    <td>{{ $appointment->price }}</td>
                                                    <td>40%</td>
                                                    <td>{{ $appointment->price  * 0.4}}</td>


                                                    <td>{{ $appointment->date }}</td>
                                                    <td>{{ $appointment->time }}:00</td>

                                                    <td>{{ $appointment->created_at }}</td>
                                                    <td>{{ $appointment->updated_at }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
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
