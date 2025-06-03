@extends('frontEnd.layouts.master')
@section('title', 'Agent Account')
@section('content')

    <section class="agent_auth section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="agent_auth_box">
                        <h5 class="agent-auth-title">Change Password</h5>
                        <form action="{{ route('agent.password_update') }}" method="POST" class="row"
                            enctype="multipart/form-data" data-parsley-validate="">
                            @csrf
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="old_password">Old Password *</label>
                                        <input type="password" id="old_password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" value="" required>
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="new_password">New Password *</label>
                                        <input type="password" id="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" value="" required>
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- col-end -->



                                <!-- col-end -->
                                <div class="col-sm-12 mt-3">
                                    <div class="form-group mb-3">
                                        <button type="submit" class="submit-btn">Submit</button>
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
