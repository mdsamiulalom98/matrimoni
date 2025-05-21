@extends('frontEnd.layouts.master')
@section('title','Contact')
@section('content')

<section class="contact_section">
    <div class="container">
        <h2 class="section_title">Get In Touch</h2>
        <p class="section_subtitle">Feel free to contact us anytime!</p>
        <div class="contact_form_container">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" name="subject" placeholder="Enter subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message *</label>
                    <textarea name="message" placeholder="Write your message here" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="contact_btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
@push('script')
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
@endpush