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
                            <h3 class="page-title">users</h3>
                        </div>
                        <div class="col-auto text-right">
                            <a href="{{ route('admin.users.show','1') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-sync"></i></a>
                            <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                                <i class="fas fa-filter"></i>
                            </a>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data"
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

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>  name</th>

                                                 <th>email</th>

                                                <th>phone</th>
                                                 <th>subscribtion</th>
                                                <th>status</th>

                                                <th>Date created</th>
                                                <th>Date updated</th>

                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $users = DB::table('users')->orderBy('created_at')->get()->all();
                                            ?>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>


                                                    <td>
                                                        {{ $user->name }} </td>

                                                    <td>{{ $user->email }}  </td>
                                                    <td>{{ $user->phone }}  </td>

 

                                                    <td>{{ DB::table('subscribtions')->where('id', $user->subscribtion_id)->value('name') != ''  ? DB::table('subscribtions')->where('id', $user->subscribtion_id)->value('name') : 'NO Subscribtion'}}</td>
                                                    <td>
                                                        <div data-toggle="tooltip"
                                                            title="Someone Booked The user So You Cannot Modify It ..!">
                                                            <div class="status-toggle">
                                                                <input id="status_1" class="check change_Status_user"
                                                                    data-id="1" type="checkbox"
                                                                    {{  $user->status == 'active' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label for="status_1"
                                                                    class="checktoggle">checkbox</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>{{ $user->created_at }}</td>
                                                    <td>{{ $user->updated_at }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="far fa-edit mr-1"></i> Edit
                                                        </a>
                                                        <a onclick="$('#delete_user_{{ $user->id }}').submit()"
                                                            class="on-default remove-row btn btn-sm bg-danger-light delete_users"
                                                            id="Onremove_1" data-id="1"><i
                                                                class="far fa-trash-alt mr-1"></i> Delete</a>
                                                        <form id="delete_user_{{ $user->id }}" method="post"
                                                            action="{{ route('admin.users.destroy', $user->id) }}"
                                                            style="display: none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
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
