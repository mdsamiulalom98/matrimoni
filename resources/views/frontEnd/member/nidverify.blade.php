@extends('frontEnd.layouts.master')
@section('title', 'Member Login')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content shadow-lg p-4 rounded login_container">
                        <p class="auth-title text-center mb-4">NID Verify</p>
                        <form action="{{ route('nid.verify') }}" method="POST" data-parsley-validate="">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label for="nid_image">Provide a photo of your NID for account verification *</label>
                                <div class="input-group">
                                    <input type="file" id="nid_image"
                                        class="form-control @error('nid_image') is-invalid @enderror"
                                        placeholder="Enter Your Password" name="password" required>
                                </div>
                                @error('nid_image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button class="submit-btn w-100 mt-3">Submit</button>
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
@endpush
