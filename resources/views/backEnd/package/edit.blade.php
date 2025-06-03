@extends('backEnd.layouts.master')
@section('title', 'Package Edit')
@section('css')
    <style>
        .increment_btn,
        .remove_btn,
        .btn-warning {
            margin-top: -17px;
            margin-bottom: 10px;
        }
    </style>
    <link href="{{ asset('public/backEnd') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/backEnd') }}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('packages.index') }}" class="btn btn-primary rounded-pill">Manage</a>
                    </div>
                    <h4 class="page-title">Package Edit</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('packages.update') }}" method="POST" class="row" data-parsley-validate=""
                            enctype="multipart/form-data" name="editForm">
                            @csrf
                            <input type="hidden" value="{{ $edit_data->id }}" name="id" />
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Package Name *</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $edit_data->title ?? old('title') }}" id="title"
                                        required />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->

                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="amount" class="form-label">Package Price *</label>
                                    <input type="text"
                                        class="nrequired form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ $edit_data->amount ?? old('amount') }}" id="amount" />
                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="timespan" class="form-label">Package Validity *</label>
                                    <input type="text"
                                        class="nrequired form-control @error('timespan') is-invalid @enderror"
                                        name="timespan" value="{{ $edit_data->timespan ?? old('timespan') }}"
                                        id="timespan" />
                                    @error('timespan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label for="button_text" class="form-label">Button Text *</label>
                                    <input type="text"
                                        class="nrequired form-control @error('button_text') is-invalid @enderror"
                                        name="button_text" value="{{ $edit_data->button_text ?? old('button_text') }}"
                                        id="button_text" />
                                    @error('button_text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->
                            <div class="col-sm-12 mb-3">
                                <label for="payment_method">Package Info</label>
                                @foreach($packageinfos as $info)
                                <input type="hidden" name="up_id[]" value="{{ $info->id }}">
                                <div class="control-group input-group justify-content-between">
                                    <div class="row col-11">

                                        <!-- col-end -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="up_icon[]" class="form-control payment_amount" value="{{ $info->icon }}"
                                                    placeholder="like: 'fa fa-plus'">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="up_ititle[]"  value="{{ $info->title ?? old('title') }}"
                                                    class="form-control " placeholder="Title">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger btn-danger" type="button"><i
                                                class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                                @endforeach
                                <div class="clone hide" style="display: none;">
                                    <div class="control-group input-group justify-content-between">
                                        <div class="row col-11">

                                            <!-- col-end -->
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="icon[]"
                                                        class="form-control payment_amount"
                                                        placeholder="like: 'fa fa-plus'">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" name="ititle[]" value="{{ old('title') }}"
                                                        class="form-control " placeholder="Title">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger btn-danger" type="button"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group control-group increment justify-content-between">
                                    <div class="row col-11">

                                        <!-- col-end -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="icon[]" class="form-control payment_amount"
                                                    placeholder="like: 'fa fa-plus'">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="ititle[]" value="{{ old('title') }}"
                                                    class="form-control " placeholder="Title">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="input-group-btn">
                                        <button class="btn btn-success btn-increment" type="button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    @error('banner')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col-end -->
                            <!-- col end -->
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="status" class="d-block">Status</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="status" {{ $edit_data->status == 1 ? 'checked' : '' }} />
                                        <span class="slider round"></span>
                                    </label>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="popular" class="d-block">Popular</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="popular" {{ $edit_data->popular == 1 ? 'checked' : '' }} />
                                        <span class="slider round"></span>
                                    </label>
                                    @error('popular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->
                            <div class="col-sm-3 mb-3">
                                <div class="form-group">
                                    <label for="free" class="d-block">Free Pacakge</label>
                                    <label class="switch">
                                        <input type="checkbox" value="1" name="free" {{ $edit_data->free == 1 ? 'checked' : '' }} />
                                        <span class="slider round"></span>
                                    </label>
                                    @error('free')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- col end -->

                            <div>
                                <input type="submit" class="btn btn-success" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <!-- end card-body-->
                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
        </div>
    </div>
    @endsection @section('script')
    <script src="{{ asset('public/backEnd/') }}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('public/backEnd/') }}/assets/js/pages/form-advanced.init.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/backEnd/') }}/assets/libs//summernote/summernote-lite.min.js"></script>
    <script>
        $(".summernote").summernote({
            placeholder: "Enter Your Text Here",
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#product_type').change(function() {
                var id = $(this).val();
                if (id == 1) {
                    $('.normal_product').show();
                    $('.variable_product').hide();
                } else {
                    $('.variable_product').show();
                    $('.normal_product').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var serialNumber = 1;
            $(".increment_btn").click(function() {
                var html = $(".clone_variable").html();
                var newHtml = html.replace(/stock\[\]/g, "stock[" + serialNumber + "]");
                $(".variable_product").after(newHtml);
                serialNumber++;
            });
            $("body").on("click", ".remove_btn", function() {
                $(this).parents(".increment_control").remove();
                serialNumber--;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });

        // category to sub
        $("#category_id").on("change", function() {
            var ajaxId = $(this).val();
            if (ajaxId) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('ajax-product-subcategory') }}?category_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#subcategory_id").empty();
                            $("#subcategory_id").append('<option value="0">Choose...</option>');
                            $.each(res, function(key, value) {
                                $("#subcategory_id").append('<option value="' + key + '">' +
                                    value + "</option>");
                            });
                        } else {
                            $("#subcategory_id").empty();
                        }
                    },
                });
            } else {
                $("#subcategory_id").empty();
            }
        });

        // subcategory to childcategory
        $("#subcategory_id").on("change", function() {
            var ajaxId = $(this).val();
            if (ajaxId) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('ajax-product-childcategory') }}?subcategory_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#childcategory_id").empty();
                            $("#childcategory_id").append('<option value="0">Choose...</option>');
                            $.each(res, function(key, value) {
                                $("#childcategory_id").append('<option value="' + key + '">' +
                                    value + "</option>");
                            });
                        } else {
                            $("#childcategory_id").empty();
                        }
                    },
                });
            } else {
                $("#childcategory_id").empty();
            }
        });
    </script>
    <script type="text/javascript">
        document.forms["editForm"].elements["category_id"].value = "{{ $edit_data->category_id }}";
        document.forms["editForm"].elements["subcategory_id"].value = "{{ $edit_data->subcategory_id }}";
        document.forms["editForm"].elements["childcategory_id"].value = "{{ $edit_data->childcategory_id }}";
    </script>
@endsection
