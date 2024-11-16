<!DOCTYPE html>



<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin add subscribtion</title>

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
                                    <h3 class="page-title">Add subscribtion</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="card">
                            <div class="card-body">
                                <form id="add-subscribtion" action="{{ route('subscribtions.store') }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">


                                    @csrf

                                    <div class="form-group mb-3">
                                        <label>subscribtion Name <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            required="" data-bv-field="name" value="{{ old('name') }}">
                                        @error('name')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="name"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>subscribtion type <span class="text-danger">*
                                            </span></label>
                                            <input class="form-control" type="text" name="subscribtion_type" id="subscribtion_type"
                                            required="" data-bv-field="subscribtion_type" value="{{ old('subscribtion_type') }}">

                                         @error('subscribtion_type')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="subscribtion_type"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>subscribtion price  <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="subscribtion_price" id="subscribtion_price"
                                            required="" data-bv-field="subscribtion_price" value="{{ old('subscribtion_price') }}">
                                        @error('subscribtion_price')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="subscribtion_price"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>




                                    <div class="form-group mb-3">
                                        <label>subscribtion maximum_price  <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="subscribtion_maximum_price" id="subscribtion_maximum_price"
                                            required="" data-bv-field="subscribtion_maximum_price" value="{{ old('subscribtion_maximum_price') }}">
                                        @error('subscribtion_maximum_price')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Duration  <span class="text-danger">*
                                            </span></label>
                                            <select class="form-control" name="duration" id="duration">
                                                <option  value="">Select</option>
                                                <option  value="1">One Day</option>
                                                <option  value="30">One Month</option>
                                                <option  value="90" selected="">3 Months</option>
                                                <option  value="180">6 Months</option>
                                                <option  value="360">One Year</option>
                                                <option  value="720">2 Years</option>



                                            </select>
                                         @error('duration')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="duration"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">Add subscribtion</button>
                                        <a href="{{route('subscribtions.index')}}" class="btn btn-cancel">Cancel</a>
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
