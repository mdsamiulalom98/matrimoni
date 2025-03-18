@extends('frontEnd.layouts.master')
@section('title', 'Customer Account')
@section('content')
    <section class="customer-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="customer-sidebar">
                        @include('frontEnd.agent.sidebar')
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="customer-content">
                        <h5 class="account-title">My Account</h5>
                        <table class="table">
                            @php
                                $agent = \App\Models\Agent::find(Auth::guard('agent')->user()->id);
                            @endphp
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $agent->name }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $agent->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $agent->email }}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{ $agent->address }}</td>
                                </tr>
                                <tr>
                                    <td>Disctrict</td>
                                    <td>{{ $agent->district }}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>{{ $agent->cust_area ? $agent->cust_area->area_name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><img src="{{ asset($agent->image) }}" alt="" class="backend_img"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
@endpush
