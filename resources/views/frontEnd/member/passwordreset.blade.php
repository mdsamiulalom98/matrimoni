@extends('frontEnd.layouts.master')
@section('title', 'Forgot Password')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content shadow-lg p-4 rounded login_container">
                        <p class="auth-title text-center mb-4"> Forgot Password</p>
                        <form action="{{ route('member.forgot.store') }}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="passResetToken"> Verify Code *</label>
                                <input type="number" id="passResetToken"
                                    class="form-control @error('passResetToken') is-invalid @enderror"
                                    placeholder="Enter Your Verify Code" name="passResetToken" value="{{ old('passResetToken') }}"
                                    required>
                                @error('passResetToken')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="password">Password *</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                    </button>

                                </div>
                            </div>



                            <div class="form-group text-center">
                                <button class="submit-btn w-100 mt-3">Login</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
