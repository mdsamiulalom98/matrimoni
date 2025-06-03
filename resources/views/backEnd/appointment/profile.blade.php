@extends('backEnd.layouts.master')
@section('title','Appointments Details')
@section('css')
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('agents.index')}}" class="btn btn-primary rounded-pill">Agent List</a>
                    <form method="post" action="{{route('agents.adminlog')}}" class="d-inline" target="_blank">
                        @csrf
                    <input type="hidden" value="{{$profile->id}}" name="hidden_id">
                    <button type="button" class="btn btn-info rounded-pill change-confirm" title="Login as customer"><i class="fe-log-in"></i> Login</button></form>
                </div>
                <h4 class="page-title">Appointments Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="rounded-circle avatar-lg img-thumbnail">
                          <i data-feather="info"></i>
                    </div>

                    <h4 class="mb-0">{{$profile->name}}</h4>

                    <a href="tel:{{$profile->phone}}" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Call</a>
                    <a href="mailto:{{$profile->email}}" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Email</a>

                    <div class="text-start mt-3">
                        <h4 class="btn btn-success btn-xs waves-effect font-13 text-uppercase">Account Status : {{$profile->status}}</h4>
                        <table class="table">
                            <tbody>
                            <tr class="text-muted mb-2 font-13">
                                <td>Full Name </td>
                                <td class="ms-2">{{$profile->name}}</td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Mobile </td>
                                <td class="ms-2">{{$profile->phone}}</td>
                            </tr>

                            <tr class="text-muted mb-2 font-13">
                                <td>Email </td>
                                <td class="ms-2">{{$profile->email}}</td>
                            </tr>

                            <tr class="text-muted mb-1 font-13">
                                <td>Address </td>
                                <td class="ms-2">{{$profile->address}}</td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>Appointment Date </td>
                                <td class="ms-2">{{$profile->preferred_date}}</td>
                            </tr>
                            <tr class="text-muted mb-1 font-13">
                                <td>Message </td>
                                <td class="ms-2">{{$profile->message}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->

        </div> <!-- end col-->
    </div>
    <!-- end row-->

</div> <!-- container -->

</div> <!-- content -->
@endsection


@section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
@endsection
