@extends('backEnd.layouts.master')
@section('title', 'Package Manage')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ route('packages.create') }}" class="btn btn-danger rounded-pill"><i
                                class="fe-shopping-cart"></i> Add Package</a>
                    </div>
                    <h4 class="page-title">Package Manage</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <ul class="action2-btn">

                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <form class="custom_form">
                                    <div class="form-group">
                                        <input type="text" name="keyword" placeholder="Search">
                                        <button class="btn  rounded-pill btn-info">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table nowrap w-100">
                                <thead>
                                    <tr>
                                        <th style="width:2%">
                                            <div class="form-check"><label class="form-check-label"><input type="checkbox"
                                                        class="form-check-input checkall" value=""></label>
                                        <th style="width:2%">SL</th>
                        </div>
                        </th>
                        <th style="width:10%">Action</th>
                        <th style="width:20%">Name</th>
                        <th style="width:10%">Category</th>
                        <th style="width:10%">Image</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Stock</th>
                        <th style="width:14%">Deal & Feature</th>
                        <th style="width:8%">Status</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td><input type="checkbox" class="checkbox" value="{{ $value->id }}"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="button-list custom-btn-list">
                                            @if ($value->status == 1)
                                                <form method="post" action="{{ route('packages.inactive') }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <input type="hidden" value="{{ $value->id }}" name="hidden_id">
                                                    <button type="button" class="change-confirm" title="Active"><i
                                                            class="fe-thumbs-down"></i></button>
                                                </form>
                                            @else
                                                <form method="post" action="{{ route('packages.active') }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <input type="hidden" value="{{ $value->id }}" name="hidden_id">
                                                    <button type="button" class="change-confirm" title="Inactive"><i
                                                            class="fe-thumbs-up"></i></button>
                                                </form>
                                            @endif

                                            <a href="{{ route('packages.edit', $value->id) }}" title="Edit"><i
                                                    class="fe-edit"></i></a>

                                            <form method="post" action="{{ route('packages.destroy') }}" class="d-inline">
                                                @csrf
                                                <input type="hidden" value="{{ $value->id }}" name="hidden_id">
                                                <button type="submit" class="delete-confirm" title="Delete"><i
                                                        class="fe-trash-2"></i></button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->category ? $value->category->name : '' }}</td>
                                    <td><img src="{{ asset($value->image ? $value->image->image : '') }}" class="backend-image"
                                            alt=""></td>
                                    <td>{{ $value->variable ? $value->variable->new_price : $value->new_price }}</td>
                                    <td>{{ $value->type == 0 ? $value->variables_sum_stock : $value->stock }}</td>
                                    <td>
                                        <p class="m-0">Hot Deals : {{ $value->topsale == 1 ? 'Yes' : 'No' }}</p>
                                        <p class="m-0">Feature Package : {{ $value->feature_product == 1 ? 'Yes' : 'No' }}</p>
                                        <p class="m-0">New Arrival : {{ $value->new_arrival == 1 ? 'Yes' : 'No' }}</p>
                                    </td>
                                    <td>
                                        @if ($value->status == 1)
                                            <span class="badge bg-soft-success text-success">Active</span>
                                        @else
                                            <span class="badge bg-soft-danger text-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <div class="custom-paginate">
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".checkall").on('change', function() {
                $(".checkbox").prop('checked', $(this).is(":checked"));
            });

            $(document).on('click', '.hotdeal_update', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                console.log('url', url);
                var product = $('input.checkbox:checked').map(function() {
                    return $(this).val();
                });
                var product_ids = product.get();
                if (product_ids.length == 0) {
                    toastr.error('Please Select A Package First !');
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        product_ids
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            window.location.reload();
                        } else {
                            toastr.error('Failed something wrong');
                        }
                    }
                });
            });
            $(document).on('click', '.feature_update', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                console.log('url', url);
                var product = $('input.checkbox:checked').map(function() {
                    return $(this).val();
                });
                var product_ids = product.get();
                if (product_ids.length == 0) {
                    toastr.error('Please Select A Package First !');
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        product_ids
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            window.location.reload();
                        } else {
                            toastr.error('Failed something wrong');
                        }
                    }
                });
            });
            $(document).on('click', '.arrival_update', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                console.log('url', url);
                var product = $('input.checkbox:checked').map(function() {
                    return $(this).val();
                });
                var product_ids = product.get();
                if (product_ids.length == 0) {
                    toastr.error('Please Select A Package First !');
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        product_ids
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            window.location.reload();
                        } else {
                            toastr.error('Failed something wrong');
                        }
                    }
                });
            });
            $(document).on('click', '.update_status', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var product = $('input.checkbox:checked').map(function() {
                    return $(this).val();
                });
                var product_ids = product.get();
                if (product_ids.length == 0) {
                    toastr.error('Please Select A Package First !');
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        product_ids
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            window.location.reload();
                        } else {
                            toastr.error('Failed something wrong');
                        }
                    }
                });
            });
            $(document).on('click', '.update_status', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                var product = $('input.checkbox:checked').map(function() {
                    return $(this).val();
                });
                var product_ids = product.get();
                if (product_ids.length == 0) {
                    toastr.error('Please Select A Package First !');
                    return;
                }
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        product_ids
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            toastr.success(res.message);
                            window.location.reload();
                        } else {
                            toastr.error('Failed something wrong');
                        }
                    }
                });
            });


        })
    </script>
@endsection
