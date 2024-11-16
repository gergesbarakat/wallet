<!DOCTYPE html>
<?php
use App\models\User;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin add category</title>

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
                            <a href="{{ route('categories.create') }}" class="btn btn-primary add-button"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="category-list" method="post" id="filter_inputs">
                    @csrf
                    <div class="card filter-card">
                        <div class="card-body pb-0">
                            <div class="row filter-row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" id="category_category">
                                            <option value="">Select category</option>
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
                                        $categories = DB::table('categories')->get()->all();

                                        ?>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>image</th>

                                                <th>categories</th>
                                                <th>Status</th>
                                                <th>Date created</th>
                                                <th>Updated at</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td><img style="max-width:100px;max-height:100px;width: 100%;height:100%"
                                                            src="{{ asset($category->img) }}"
                                                            alt="{{ $category->name }}"></td>

                                                    <td>
                                                        {{ $category->name }} </td>
                                                    <td>
                                                        <div data-toggle="tooltip"
                                                            title="Someone Booked The category So You Cannot Modify It ..!">
                                                            <div class="status-toggle">
                                                                <input id="status_1"
                                                                    class="check change_Status_category" data-id="1"
                                                                    type="checkbox" {{$category->status =='active'  ?'checked' : '' }} disabled>
                                                                <label for="status_1"
                                                                    class="checktoggle">checkbox</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $category->created_at }}</td>
                                                    <td>{{ $category->updated_at }}</td>

                                                    <td>
                                                        <a href=" {{ route('categories.edit', $category->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="far fa-edit mr-1"></i> Edit
                                                        </a>
                                                        <a  onclick="$('#delete_category_{{$category->id}}').submit()"
                                                            class="on-default remove-row btn btn-sm bg-danger-light delete_categories"
                                                            id="Onremove_1" data-id="1"><i
                                                                class="far fa-trash-alt mr-1"></i> Delete</a>
                                                                <form id="delete_category_{{$category->id}}" method="post" action="{{route('categories.destroy',$category->id)}}" style="display: none">
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
