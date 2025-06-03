 @extends('frontEnd.layouts.master')
 @section('title', 'Forgot Password')
 @section('content')
     <section class="auth-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-sm-5">
                     <div class="form-content shadow-lg p-4 rounded login_container">
                         <p class="auth-title text-center mb-4"> Forgot Password</p>
                         <form action="{{ route('member.forgot.verify') }}" method="POST" data-parsley-validate="">
                             @csrf
                             <div class="form-group mb-3">
                                 <label for="phone"> Mobile Number *</label>
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


                             <div class="form-group text-center">
                                 <button class="submit-btn w-100 mt-3">Login</button>
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
