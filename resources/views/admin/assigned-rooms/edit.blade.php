<!DOCTYPE html>
<?php
use App\models\assigned_room;

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
                                <div class="col-sm-12">
                                    <h3 class="page-title">Edit Assigned Room </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="card">
                            <div class="card-body">
                                <form id="add-assigned_room" action="{{ route('assigned-rooms.update', $assigned_room) }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data" novalidate="novalidate"
                                    class="bv-form">
                                    @method('PATCH')
                                     @csrf
                                     <input type="text" class="form-control" name="id" value="{{ $assigned_room->id  }}" hidden>

                                     <div class="form-group mb-3">
                                        <label>User Email <span class="text-danger">*
                                        </span></label>
                                         <input type="text" class="form-control" value="{{ DB::table('users')->find( $assigned_room->user_id)->email  }}" disabled>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Room name <span class="text-danger">*
                                        </span></label>
                                         <input type="text" class="form-control" value="{{ DB::table('rooms')->find( $assigned_room->room_id)->name  }}" disabled>
                                    </div>
                                     <div class="  flex-column d-flex my-3   ">
                                        <label>Availability <span class="text-danger">*
                                            </span></label>

                                        <div class="w-100  d-flex flex-column justify-content-between">
                                            <select name="day" class=" form-control w-100" value="sat">
                                                <option value="sat">Sat</option>
                                                <option value="sun">Sun</option>
                                                <option value="mon">Mon</option>
                                                <option value="tue">Tue</option>
                                                <option value="wed">Wed</option>
                                                <option value="thu">Thu</option>
                                                <option value="fri">Fri</option>

                                            </select>
                                            <div name="hour" class="m-3 flex-wrap d-flex w-100">
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="00" id="flexCheck00">
                                                    <label class="form-check-label" for="flexCheck00">
                                                        00:00
                                                    </label>
                                                </div>

                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="01" id="flexCheck01">
                                                    <label class="form-check-label" for="flexCheck01">
                                                        01:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="02" id="flexCheck02">
                                                    <label class="form-check-label" for="flexCheck02">
                                                        02:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="03" id="flexCheck03">
                                                    <label class="form-check-label" for="flexCheck03">
                                                        03:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="04" id="flexCheck04">
                                                    <label class="form-check-label" for="flexCheck04">
                                                        04:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="05" id="flexCheck05">
                                                    <label class="form-check-label" for="flexCheck05">
                                                        05:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="06" id="flexCheck06">
                                                    <label class="form-check-label" for="flexCheck06">
                                                        06:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="07" id="flexCheck07">
                                                    <label class="form-check-label" for="flexCheck07">
                                                        07:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="08" id="flexCheck08">
                                                    <label class="form-check-label" for="flexCheck08">
                                                        08:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="09" id="flexCheck09">
                                                    <label class="form-check-label" for="flexCheck09">
                                                        09:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="10" id="flexCheck10">
                                                    <label class="form-check-label" for="flexCheck10">
                                                        10:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="11" id="flexCheck11">
                                                    <label class="form-check-label" for="flexCheck11">
                                                        11:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="12" id="flexCheck12">
                                                    <label class="form-check-label" for="flexCheck12">
                                                        12:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="13" id="flexCheck13">
                                                    <label class="form-check-label" for="flexCheck13">
                                                        13:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="14" id="flexCheck14">
                                                    <label class="form-check-label" for="flexCheck14">
                                                        14:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="15" id="flexCheck15">
                                                    <label class="form-check-label" for="flexCheck15">
                                                        15:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="16" id="flexCheck16">
                                                    <label class="form-check-label" for="flexCheck16">
                                                        16:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="17" id="flexCheck17">
                                                    <label class="form-check-label" for="flexCheck17">
                                                        17:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="18" id="flexCheck18">
                                                    <label class="form-check-label" for="flexCheck18">
                                                        18:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="19" id="flexCheck19">
                                                    <label class="form-check-label" for="flexCheck19">
                                                        19:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="20" id="flexCheck20">
                                                    <label class="form-check-label" for="flexCheck20">
                                                        20:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="21" id="flexCheck21">
                                                    <label class="form-check-label" for="flexCheck21">
                                                        21:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="22" id="flexCheck22">
                                                    <label class="form-check-label" for="flexCheck22">
                                                        22:00
                                                    </label>
                                                </div>
                                                <div class="form-check border px-4 p-2 rounded">
                                                    <input class="form-check-input d-none" type="checkbox" name="hour[]"
                                                        value="23" id="flexCheck23">
                                                    <label class="form-check-label" for="flexCheck23">
                                                        23:00
                                                    </label>
                                                </div>

                                            </div>
                                            <div>
                                                <div class="btn btn-primary add-hour-button m-3">Add Hour</div>

                                            </div>

                                        </div>

                                        <script>
                                            $('.form-check-label').click(function() {
                                                if ($(this).parent().is('.bg-primary')) {
                                                    $(this).parent().removeClass('bg-primary')
                                                    $(this).parent().removeClass('text-light')

                                                } else {
                                                    $(this).parent().addClass('bg-primary')
                                                    $(this).parent().addClass('text-light')

                                                }

                                            })

                                            $('.add-hour-button').click(function() {
                                                var day = $('select[name=day]').val()
                                                var hour = $('input[name=hour]')

                                                console.log(hour)
                                                $('.' + day).text('')

                                                $("input[name='hour[]']:checked").each(function() {
                                                    var hourValue = $(this).val();
                                                    console.log(hourValue); // You can use this value for any other purpose


                                                    $('.' + day).append(`

                                                    <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                        ${hourValue}:00
                                                        <input name='avail[${day}][]' value='${hourValue}' class='d-none' >
                                                        <div class="rounded bg-danger col-4 text-light"
                                                            onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                        </div>
                                                    </div>

                                                    `)
                                                    $(this).parent().children('.form-check-input').prop('checked', false);
                                                    $(this).parent().removeClass('bg-primary')
                                                    $(this).parent().removeClass('text-light')

                                                });

                                                 // }
                                            })
                                        </script>
                                        <div class="  d-flex  flex-row justify-content-center align-items-center">
                                            <div class="  d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Sat</div>
                                            <div class="  d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Sun</div>
                                            <div class=" d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Mon</div>
                                            <div class=" d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Tue</div>
                                            <div class=" d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Wed</div>
                                            <div class=" d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Thu</div>
                                            <div class=" d-flex p-2 bg-secondary text-light  justify-content-center align-items-center"
                                                style="width:14%">Fri</div>
                                        </div>
                                        <?php
                                        $avail = json_decode(base64_decode($assigned_room->availability_id));
                                        ?>

                                        <div class="  d-flex  flex-row justify-content-center align-items-start days">
                                            <div class="sat d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                    @foreach ($avail as $key => $value)

                                                        <?php
                                                        $availal = DB::table('availabilities')->find($value);
                                                        ?>
                                                            @if($availal->day == "sat")

                                                                    <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                        {{ $availal->hour }}:00
                                                                            <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                            <div class="rounded bg-danger col-4 text-light"
                                                                                onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                            </div>
                                                                    </div>
                                                             @endif

                                                        @endforeach
                                              </div>
                                            <div class="sun d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "sun")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>
                                            <div class="mon d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "mon")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>
                                            <div class="tue d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "tue")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>
                                            <div class="wed d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "wed")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>
                                            <div class="thu d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "thu")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>
                                            <div class="fri d-flex p-2 flex-column justify-content-center align-items-start "
                                                style="width:14%">
                                                @foreach ($avail as $key => $value)

                                                <?php
                                                $availal = DB::table('availabilities')->find($value);
                                                ?>
                                                    @if($availal->day == "fri")

                                                            <div class="w-100 my-2 rounded d-flex flex-row justify-content-between bg-light p-2  ">
                                                                {{ $availal->hour }}:00
                                                                    <input name='avail[{{ $availal->day }}][]' value='{{ $availal->hour }}' class='d-none' >
                                                                    <div class="rounded bg-danger col-4 text-light"
                                                                        onclick="$(this).parent().hide(400).delay(600).remove()">X
                                                                    </div>
                                                            </div>
                                                     @endif

                                                @endforeach
                                            </div>





                                        </div>
                                    </div>
                                    @error('avail')
                                    <small class="help-block" data-bv-validator="file" data-bv-for="avail"
                                        data-bv-result="NOT_VALIDATED">
                                        {{ $message }}
                                    </small>
                                @enderror

                                    {{-- <div class="form-group mb-3">
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
                                    {{-- <div class="form-group mb-3">
                                        <label>Subscribtion <span class="text-danger">*
                                            </span></label>

                                        <select name="assigned_room_subscribtion" id="assigned_room_subscribtion" class="form-control"
                                            required>
                                            <option value="">NO Subscribtion</option>

                                            <?php
                                            // $subscribtion = DB::table('subscribtions')->get()->all();
                                            ?>
                                            @foreach ($subscribtion as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('assigned_room_subscribtion')
                                            <small class="help-block" data-bv-validator="file"
                                                data-bv-for="assigned_room_subscribtion" data-bv-result="NOT_VALIDATED">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group mt-4">
                                        <button class="btn btn-primary mr-2" name="form_submit" value="submit"
                                            type="submit">  Edit assigned Room</button>
                                        <a href="{{ route('assigned-rooms.show', '') }}"
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
