<!DOCTYPE html>
<?php
use App\models\User;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin add appointment</title>

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
                            <h3 class="page-title">categories</h3>
                        </div>
                        <div class="col-auto text-right">
                            <a href="categories" class="btn btn-primary add-button"><i class="fas fa-sync"></i></a>
                            <a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
                                <i class="fas fa-filter"></i>
                            </a>
                            <a href="{{ route('assigned-rooms.create') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="appointment-list" method="post" id="filter_inputs">
                    @csrf
                    <div class="card filter-card">
                        <div class="card-body pb-0">
                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>appointment</label>
                                        <select class="form-control" name="appointment" id="appointment_appointment">
                                            <option value="">Select appointment</option>
                                            <option value="1">cat1</option>
                                            <option value="2">jhgkj</option>
                                            <option value="4">jglhhbkjj</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>status</label>
                                        <div class="cal-icon">
                                            <input class="form-control start_date" type="text" name="from">
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
                                                <th>User</th>

                                                <th>Room</th>
                                                <th>Customer Name</th>
                                                <th>Customer Phone</th>
                                                <th>Customer email</th>

                                                <th>Pay Type</th>
                                                <th>Pay Status</th>

                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Date Created</th>
                                                <th>Updated At</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                                <?php
                                                $customer = DB::table('customers')->where('id' ,$appointment->customer_id)->get()[0];
                                                $user =  DB::table('users')->find($appointment->user_id)->email;
                                                $room = DB::table('rooms')->find($appointment->room_id)->name
                                                ?>
                                                <tr>
                                                    <td>{{ $appointment->id }}</td>
                                                    <td> {{$user }}
                                                    </td>
                                                    <td> {{ $room}}
                                                    </td>

                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $appointment->type }}</td>
                                                    <td>{{ $appointment->payment }}</td>

                                                    <td>
                                                        <div data-toggle="tooltip"
                                                            title="Someone Booked The user So You Cannot Modify It ..!">
                                                            <div class="status-toggle">
                                                                <input id="status_1" class="check change_Status_user"
                                                                    data-id="1" type="checkbox"
                                                                    {{ $appointment->status == 'active' ? 'checked' : '' }}
                                                                    disabled>
                                                                <label for="status_1"
                                                                    class="checktoggle">checkbox</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $appointment->date }}</td>
                                                    <td>{{ $appointment->time }}:00</td>

                                                    <td>{{ $appointment->created_at }}</td>
                                                    <td>{{ $appointment->updated_at }}</td>

                                                    <td>
                                                        <a href=" {{ route('appointments.edit', $appointment->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="far fa-edit mr-1"></i> Edit
                                                        </a>
                                                        <a onclick="$('#delete_appointment_{{ $appointment->id }}').submit()"
                                                            class="on-default remove-row btn btn-sm bg-danger-light delete_categories"
                                                            id="Onremove_1" data-id="1"><i
                                                                class="far fa-trash-alt mr-1"></i> Delete</a>
                                                        <form id="delete_appointment_{{ $appointment->id }}"
                                                            method="post"
                                                            action="{{ route('appointments.destroy', $appointment->id) }}"
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



        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

        <!--  validation script  -->

        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('js/moment.min.js') }}"></script>

        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js') }}"></script>





        <!-- Slimscroll JS -->

        <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>




        <script src="{{ asset('js/bootstrapValidator.min.js') }}"></script>



        <!-- Datatables JS -->

        <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>



        <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>



        <!-- Select2 JS -->


        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>



        <script src="{{ asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>





        <input type="hidden" name="location_type" id="location_type" value="manual">

        <script src="{{ asset('js/admin.js') }}"></script>

        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>








        <input type="hidden" id="page" value="dashboard">

        <input type="hidden" id="page2" value="">

        <input type="hidden" id="provider_list_url" value="/admin/provider_list">

        <input type="hidden" id="requests_list_url" value="/admin/request_list">

        <input type="hidden" id="user_list_url" value="/admin/users_list">

        <input type="hidden" id="adminuser_list_url" value="/adminusers_list">

        <input type="hidden" name="map_key" id='map_key' value="AIzaSyA2BIC2skEhYaL-ETSvKvd5UjAi_UVJAKU">

        <input type="hidden" id="revenue_url" value="/admin/revenue_list">











        <script src="{{ asset('js/jquery.checkboxall-1.0.min.js') }}"></script>


        <script src="{{ asset('js/admin_functions.js') }}"></script>

        <!--External js Start-->




        <!--External js end-->





        <!-- <script type="text/javascript">
            $(document).ready(function() {

                CKEDITOR.disableAutoInline = true;

                CKEDITOR.inline('.content-textarea');

                $('textarea.content-textarea').ckeditor();

            });
        </script>

        <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script> -->













        <script type="text/javascript">
            function allowNumbersOnly(e) {

                var code = (e.which) ? e.which : e.keyCode;

                if (code > 31 && (code < 48 || code > 57)) {

                    e.preventDefault();

                }

            }
        </script>

</body>

</html>
