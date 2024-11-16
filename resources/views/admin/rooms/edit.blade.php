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
                                    <h3 class="page-title">Edit room</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->
                        <?php
                        $room = DB::table('rooms')->find($id);
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <form id="add-room" action="{{ route('rooms.update', $room->id) }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">
                                    @method('PATCH')


                                    @csrf

                                    <div class="form-group mb-3">
                                        <label>Room Name <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="room_name" id="room_name"
                                            required="" data-bv-field="room_name" value="{{ $room->name }}">
                                        @error('room_name')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Room Number <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="room_number" id="room_number"
                                            required="" data-bv-field="room_number" value="{{ $room->number }}">
                                        @error('room_number')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-3">
                                        <label>Room Category <span class="text-danger">*
                                            </span></label>

                                        <select name="room_category" id="room_category" class="form-control" required>
                                            <?php
                                            $categories = DB::table('categories')->get()->all();

                                            ?>
                                            @foreach ($categories as $category)
                                                <option {{ $room->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('room_category')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Room price <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="room_price" id="room_price"
                                            required="" data-bv-field="room_price" value="{{ $room->price }}">
                                        @error('room_price')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Room describtion <span class="text-danger">*
                                            </span></label>
                                        <input class="form-control" type="text" name="room_describtion"
                                            id="room_describtion" required="" data-bv-field="room_describtion"
                                            value="{{ $room->describtion }}">
                                        @error('room_describtion')
                                            <small class="help-block" data-bv-validator="file" data-bv-for="category_image"
                                                data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Room Devices <span class="text-danger">*
                                            </span></label>

                                        <select name="room_device" id="room_device" class="form-control" required>
                                            <?php
                                            $categories = DB::table('devices')->get()->all();
                                            $index = 1;
                                            ?>
                                            @foreach ($categories as $category)
                                                <option {{ $index <= 1 ? 'selected' : '' }}
                                                    value="{{ $category->id }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="w-100">

                                        <label>Assigned Devices <span class="text-danger">* </span></label>
                                        <div class="devices-box d-flex flex-wrap">
                                            <?php
                                            $devices = DB::table('assigned_devices')->where('room_id',$room->id)->get()->all();
                                            $index = 1;
                                            ?>
                                            @foreach($devices as $device_id)
                                                <?php

                                                $device = DB::table('devices')->find($device_id->device_id) ;

                                                ?>
                                                <div id="device{{ $device->id }}" class="border m-2 rounded position-relative" style="width:200px;height:200px; ">
                                                    <div class="btn btn-danger" style="position: absolute;top:2%;right:2%" onclick="$(this).parent().hide(400);$(this).parent().delay(1000).remove();">X</div>
                                                    <img src="{{ asset($device->img) }}" alt="" style="width:100%;height:80%">
                                                     <div class="p-2"> Device : {{ $device->name }}</div>
                                                    <input type="text" name="device[]" value="{{ $device->id }}" hidden>
                                                </div>
                                            @endforeach

                                        </div>
                                        @error('assigned_devices')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="assigned_devices" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>
                                    <script>
                                        $imagepath = '{{ asset('img') }}/../'


                                        $('#room_device').change(function(e) {
                                            console.log($(this).val())
                                            $.ajax({
                                                url: `{{ url('admin/get-device') }}`,
                                                type: 'GET',
                                                data: {
                                                    '_token': '<?php echo csrf_token(); ?>',
                                                    'id': $(this).val(),
                                                },
                                                success: function(res) {
                                                    response = JSON.parse(res)
                                                    if($(`#device${response.id}`).length){
                                                        Swal.fire('','already added','error')
                                                    }else{
                                                        $('.devices-box').append(`
                                                    <div id="device${response.id}" class="border m-2 rounded position-relative" style="width:200px;height:200px;display:none">
                                                        <div class="btn btn-danger" style="position: absolute;top:2%;right:2%" onclick="$(this).parent().hide(400);$(this).parent().delay(1000).remove();">X</div>
                                                        <img src="${$imagepath+response.img}" alt="" style="width:100%;height:80%">
                                                        <div class="p-2"> Device : ${response.name} </div>
                                                        <input type="text" name="device[]" value="${response.id}" hidden>
                                                    </div>

                                                    `)
                                                    $('#device' + response.id).show(400)

                                                    }
                                                }
                                                })

                                        })
                                    </script>

                                    <div class="form-group d-flex mb-3 flex-wrap" style=" ">
                                        <label class="w-100 col-12">Room Image</label>
                                        <input class="form-control col-12" style="height: fit-content" type="file"
                                            name="room_image" id="room_image" data-bv-field="room_image"
                                            value="{{ asset($room->img) }}">
                                        <img id="imageinputshow" style="    border-radius: 1.25rem !important; "
                                            class='border mt-2   rounded' src="{{ asset($room->img) }}"
                                            alt="" width="300px" height="200px">
                                        @error('room_image')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="category_image" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <script>
                                        // Get a reference to our file input

                                        $("#room_image").change(function(e) {

                                            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                                                var file = e.originalEvent.srcElement.files[i];

                                                var img = document.createElement("img");
                                                var reader = new FileReader();
                                                reader.onloadend = function() {
                                                    img.src = reader.result;
                                                    $("#imageinputshow").attr('src', reader.result);
                                                    $("#imageinputshow").show(400);

                                                }
                                                reader.readAsDataURL(file);
                                                console.log(img)

                                            }
                                        });
                                    </script>

                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">Update room</button>
                                        <a href="{{ route('rooms.index') }}" class="btn btn-cancel">Cancel</a>
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
