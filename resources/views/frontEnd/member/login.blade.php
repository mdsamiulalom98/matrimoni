@extends('frontEnd.layouts.master')
@section('title', 'Member Login')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content shadow-lg p-4 rounded login_container">
                        <p class="auth-title text-center mb-4">🔑 Member Login</p>
                        <form action="{{ route('member.signin') }}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="phone">📱 Mobile Number *</label>
                                {{-- <input type="phone" id="phone" --}}
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter phone number" pattern="[0-9]{10,15}"

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
                                <div class="form-group position-relative mb-3">
                                    <label for="password">🔒 Password *</label>
                                    <input type="password" placeholder="আপনার পাসওয়ার্ড লিখুন" value="{{old('password')}}" id="passwordInput" name="password" type="text" class="form-control @error('password') is-invalid @enderror" required />
                                    <span class="toggle-btnsss" id="togglePassword">&#128065;</span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('member.forgot.password') }}" class="forget-link text-danger">
                                    <i class="fa-solid fa-unlock"></i> Forgot Password?
                                </a>
                            </div>

                            <div class="form-group text-center">
                                <button class="submit-btn w-100 mt-3">🚪 Login</button>
                            </div>
                        </form>

                        <div class="register-now text-center mt-4">
                            <p>Don't Have An Account?
                                <a href="{{ url('member/register') }}" class="text-primary">
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
    <script>
        $(document).ready(function () {
        $('#togglePassword').click(function () {
          // Toggle the password field type
          var passwordField = $('#passwordInput');
          var fieldType = passwordField.attr('type');
          
          if (fieldType === 'password') {
            passwordField.attr('type', 'text');
            $('#togglePassword').html('&#128064;'); // Eye icon open
          } else {
            passwordField.attr('type', 'password');
            $('#togglePassword').html('&#128065;'); // Eye icon closed
          }
        });
      });
      
      
        function onlyNumbersAndConvert(input) {
            // Extract the value from the input
            let value = input.value;
            
            // Remove any non-numeric characters
             value = value.replace(/[^০-৯0-9]/g, '');
        
            // Optionally, convert the numbers to English numerals if needed
            value = convertToEnglishNumbersb(value);
        
            // Update the input value
            input.value = value;
        }
        // Example of a conversion function (if needed)
        function convertToEnglishNumbersb(value) {
            // Assuming the input might have Bengali or other numerals,
            // this function would convert them to English numerals
            const bengaliToEnglishMap = {
                '০': '0', '১': '1', '২': '2', '৩': '3', '৪': '4',
                '৫': '5', '৬': '6', '৭': '7', '৮': '8', '৯': '9'
            };
            return value.replace(/[০-৯]/g, function(match) {
                return bengaliToEnglishMap[match];
            });
        }
    </script>
@endpush

