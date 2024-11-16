<!DOCTYPE html>
<?php
use App\models\Category;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin add room</title>

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
                                <div class="col">
                                    <h3 class="page-title">Edit Category</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->
                        <?php
                        $category = DB::table('categories')->find($id);
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <form id="edit-category" action="{{ route('categories.update', $id) }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">

                                    @method('PATCH')
                                    @csrf
                                    <input class="form-control d-none" type="text" name="category_id"
                                        id="category_id" required="" data-bv-field="category_id"
                                        value="{{ $category->id }}">

                                    <div class="form-group mb-3">
                                        <label>Category <strong>(English)</strong> <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="category_name"
                                            id="category_name" required="" data-bv-field="category_name"
                                            value="{{ $category->name }}">
                                        @error('category_name')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED"  >
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Category Image</label>
                                        <input class="form-control" type="file" name="category_image"
                                            id="category_image" data-bv-field="category_image"
                                            value="{{ $category->img }}">
                                        @error('category_image')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED"  >
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>


                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">Update Category</button>
                                        <a href="javascript:void(0);" onclick="window.history.go(-1)"
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
