<!DOCTYPE html>
<?php
use App\models\Category;

?>


<html>

<x-admin.head>


</x-admin.head>

<link rel="stylesheet" href="https://rsms.me/inter/inter.css">

<title>admin edit user</title>

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
                                    <h3 class="page-title">Edit user</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->
                        <?php
                        $user = DB::table('users')->find($id);
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <form id="add-user" action="{{ route('admin.users.update', $user->id) }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">
                                    @method('PATCH')


                                    @csrf

                                     <div class="form-group mb-3">
                                        <label>name <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            required="" data-bv-field="name" value="{{ $user->name }}">
                                        @error('name')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="name"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Email <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="email" id="email"
                                            required="" data-bv-field="email" value="{{ $user->email }}">
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
                                            required="" data-bv-field="phone" value="{{ $user->phone }}">
                                        @error('phone')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="phone"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-3">
                                        <label>Subscribtion <span class="text-danger">*
                                            </span></label>

                                        <select name="user_subscribtion" id="user_subscribtion" class="form-control"
                                            required>
                                            <option {{ $user->subscribtion_id == '' ? 'selected' : '' }}
                                                value="">NO Subscribtion</option>

                                            <?php
                                            $subscribtion = DB::table('subscribtions')->get()->all();

                                            ?>
                                            @foreach ($subscribtion as $category)
                                                <option {{ $user->subscribtion_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_subscribtion')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="user_subscribtion" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>password <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="user_password"
                                            id="user_password" required="" data-bv-field="user_password"
                                            value="">
                                        @error('user_password')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="user_password" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>password_confirmation <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="user_password_confirmation"
                                            id="user_password_confirmation" required=""
                                            data-bv-field="user_password_confirmation" value="">
                                        @error('user_password_confirmation')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="user_password_confirmation" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $input_error)
                                            <div id="error-box">
                                                <small class="help-block" data-bv-validator="file"
                                                    data-bv-for="user_password_confirmation"
                                                    data-bv-result="NOT_VALIDATED">
                                                    {{ $input_error }} </small>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">Update user</button>
                                        <a href="{{ route('admin.users.show', '') }}" class="btn btn-cancel">Cancel</a>
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
