@extends('frontEnd.layouts.master')
@section('title', 'Agent Login')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content shadow-lg p-4 rounded login_container">
                        <p class="auth-title text-center mb-4">🔑 Agent Login</p>
                        <form action="{{ route('agent.signin') }}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="phone">📱 Mobile Number *</label>
                                <input type="number" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter Your Mobile Number" name="phone" value="{{ old('phone') }}"
                                    required>
                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">🔒 Password *</label>
                                <div class="input-group">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter Your Password" name="password" required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('agent.forgot.password') }}" class="forget-link text-danger">
                                    <i class="fa-solid fa-unlock"></i> Forgot Password?
                                </a>
                            </div>

                            <div class="form-group text-center">
                                <button class="submit-btn w-100 mt-3">🚪 Login</button>
                            </div>
                        </form>

                        <div class="register-now text-center mt-4">
                            <p>Don't Have An Account?
                                <a href="{{ route('joinAgent') }}" class="text-primary">
                                    <i data-feather="edit-3"></i> Register Now
                                </a>
                            </p>
                        </div>
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
