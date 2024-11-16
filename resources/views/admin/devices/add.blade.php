<!DOCTYPE html>



<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin add device</title>

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
                                    <h3 class="page-title">Add device</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="card">
                            <div class="card-body">
                                <form id="add-device" action="{{ route('devices.store') }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">


                                    @csrf

                                    <div class="form-group mb-3">
                                        <label>device Name <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            required="" data-bv-field="name">
                                        @error('name')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>device model Number  <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="model_number" id="model_number"
                                            required="" data-bv-field="model_number">
                                        @error('model_number')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>


                                     <div class="form-group mb-3">
                                        <label>device type  <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="device_type" id="device_type"
                                            required="" data-bv-field="device_type">
                                        @error('device_type')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>device describtion  <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="device_describtion" id="device_describtion"
                                            required="" data-bv-field="device_describtion">
                                        @error('device_describtion')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>device Image</label>
                                        <input class="form-control" type="file" name="device_image" id="device_image"
                                            data-bv-field="device_image">

                                        @error('device_image')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>


                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">Add device</button>
                                        <a href="{{route('devices.index')}}" class="btn btn-cancel">Cancel</a>
                                    </div>
                                </form>

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
