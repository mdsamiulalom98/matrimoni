@extends('frontEnd.layouts.master')
@section('title', 'Agent Login')
@section('content')

<section class="appointment-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow p-4 bg-white rounded">
                    <h3 class="text-center mb-4 text-primary">💍 Book an Appointment for Marriage Discussion</h3>
                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">👤 Full Name *</label>
                            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">📞 Phone Number *</label>
                            <input type="text" name="phone" id="phone" class="form-control" required placeholder="Enter your phone number">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">📞 Email Address *</label>
                            <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your phone number">
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">📅 Preferred Date *</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="time" class="form-label">⏰ Preferred Time *</label>
                            <input type="time" name="time" id="time" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">💬 Your Message</label>
                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write something..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">💬 Your Address</label>
                            <textarea name="address" id="address" class="form-control" rows="4" placeholder="Your Address..."></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="submit-btn">Book Appointment</button>
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

    <script>
        $(document).ready(function () {
            $('.toggle-password').on('click', function () {
                let input = $(this).siblings('input');
                let icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endpush
