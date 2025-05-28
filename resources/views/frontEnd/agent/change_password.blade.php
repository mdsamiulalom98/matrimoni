@extends('frontEnd.layouts.master')
@section('title', 'Agent Account')
@section('content')
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">

            <div class="profile_image">
                <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D"
                    alt="Profile Photo" class="profile-photo">
            </div>
            <div class="agent-profile-header">
                <div class="agent-profile-info">
                    <h2 style="color: #fff">{{ Auth::guard('agent')->user()->name }}</h2>
                    <p>Agent Id : {{ Auth::guard('agent')->user()->agent_id }}</p>
                    <p>My Blance : 2585Tk</p>
                </div>
            </div>
            <nav class="sidebar-nav">
                <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
                <a href="{{ route('agent.my_members') }}"><i class="fa-solid fa-person-breastfeeding"></i>My Members</a>
                <a href="{{ route('agent.profile_edit') }}"><i class="fa-solid fa-pen-to-square"></i> Profile edit</a>
                <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Password Change</a>
                <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Withdraw</a>
                <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Transection Histroy</a>
                <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Terms & Conditions</a>
                <a href="{{ route('passresetpage') }}"><i class="fa-solid fa-lock"></i> Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="customer-content checkout-shipping">
                <h5 class="account-title">Change Password</h5>
                <form action="{{ route('agent.password_update') }}" method="POST" class="row"
                    enctype="multipart/form-data" data-parsley-validate="">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="old_password">Old Password *</label>
                                <input type="password" id="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                    value="" required>
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
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    value="" required>
                                @error('new_password')
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
                                <button type="submit" class="submit-btn">Update</button>
                            </div>
                        </div>
                        <!-- col-end -->
                    </div>
                </form>
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
