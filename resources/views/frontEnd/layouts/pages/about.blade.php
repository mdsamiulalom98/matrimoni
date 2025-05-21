@extends('frontEnd.layouts.master')
@section('title', "About us")
@section('content')
<section class="about_section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about_text">
                    <h2>About Us</h2>
                    <p>Welcome to <strong>Your Matrimony Website</strong>, the trusted platform to find your perfect
                        life partner. We believe that every relationship is built on trust, love, and understanding.</p>
                    <p>Our advanced matchmaking system helps you connect with verified and like-minded individuals,
                        ensuring a safe and genuine experience.</p>
                    <a href="#" class="btn_comm">Learn More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_img">
                    <img src="{{ asset('public/frontEnd/images/about.png') }}" alt="About Us Image">
                </div>
            </div>
        </div>
    </div>

</section>
@endsection