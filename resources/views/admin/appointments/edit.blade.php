<!DOCTYPE html>
<?php
use App\models\appointment;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin edit appointmnet</title>

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
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">

                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Edit appointmnet </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="card">
                            <div class="card-body">
                                <form id="add-appointment" class="w-100 d-flex flex-wrap"
                                    action="{{ route('appointments.update', $appointment) }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">
                                    @method('PATCH')
                                    @csrf

                                    <?php
                                    $customer = DB::table('customers')->find($appointment->customer_id);
                                    $user = DB::table('users')->find($appointment->user_id);
                                    $room = DB::table('rooms')->find($appointment->room_id);

                                    ?>
                                    <input type="text" class="form-control" name="id"
                                        value="{{ $appointment->id }}" hidden>

                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>User Email <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Room <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $room->name }}" disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Customer Name <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $customer->name }}"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Customer phone <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $customer->phone }}"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Customer email <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $customer->email }}"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Pay Type <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $appointment->type }}"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>payment <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $appointment->payment }}"
                                            disabled>
                                    </div>

                                    <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Pay Type <span class="text-danger">*
                                            </span></label>
                                        <input type="text" class="form-control" value="{{ $appointment->type }}"
                                            disabled>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Subscribtion <span class="text-danger">*
                                            </span></label>

                                        <select name="appointment_subscribtion" id="appointment_subscribtion"
                                            class="form-control" required>
                                            <option value="">NO Subscribtion</option>

                                            <?php
                                            // $subscribtion = DB::table('subscribtions')->get()->all();
                                            ?>
                                            @foreach ($subscribtion as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('appointment_subscribtion')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="appointment_subscribtion" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group mb-3 col-lg-6 col-sm-12">
                                        <label>Email <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="email" id="email"
                                            required="" data-bv-field="email" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="email"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>phone <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="phone" id="phone"
                                            required="" data-bv-field="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="phone"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div> --}}
                                    {{-- --}}

                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit"> Edit appointmnet</button>
                                        <a href="{{ route('appointments.show', '') }}"
                                            class="btn btn-cancel">Cancel</a>
                                    </div>
                                </form>

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
