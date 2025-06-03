@extends('frontEnd.layouts.master')
@section('title', 'Agent Account')
@section('content')
    <section class="agent_auth section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="agent_auth_box">
                        <h5 class="agent-auth-title">Profile Update</h5>
                        <form action="{{ route('agent.profile_update') }}" method="POST" class="row"
                            enctype="multipart/form-data" data-parsley-validate="">
                            @csrf
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Full Name *</label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ $profile_edit->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone Number *</label>
                                        <input type="number" id="phone"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ $profile_edit->phone }}" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email Address *</label>
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $profile_edit->email }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="address">Address *</label>
                                        <input type="text" id="address"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ $profile_edit->address }}" required>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->

                                <!-- col-end -->
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label for="image">Image *</label>
                                        <input type="file" id="image"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{ Auth::guard('agent')->user()->image }}">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <img src="{{ asset($profile_edit->image) }}" class="rounded-circle m-1"
                                            width="50px" alt="">
                                    </div>
                                </div>
                                 <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <label>Upload NID/Passport Image *</label>
                                        <input type="file" id="image"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            value="{{ Auth::guard('agent')->user()->image }}">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <img src="{{ asset($profile_edit->nid_image) }}" class="rounded-circle m-1"
                                            width="50px" alt="">
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-12">
                                    <div class="form-group mb-3">
                                        <button type="submit" class="submit-btn">Update</button>
                                    </div>
                                </div>
                                <!-- col-end -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script></script>
@endpush
