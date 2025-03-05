@extends('frontEnd.layouts.master')
@section('title', $generalsetting->meta_title)
@push('seo')
    <meta name="app-url" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="{{ $generalsetting->meta_description }}" />
    <meta name="keywords" content="{{ $generalsetting->meta_keyword }}" />
    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $generalsetting->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="{{ asset($generalsetting->white_logo) }}" />
    <meta property="og:description" content="{{ $generalsetting->meta_description }}" />
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.theme.default.min.css') }}" />
@endpush
@section('content')
    <section class="slider-section">
        <div class="slider_container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-slider-container">
                        <div class="main_slider owl-carousel">
                            @foreach ($sliders as $key => $value)
                                <div class="slider-item">
                                    <a href="{{ $value->link }}">
                                        <img src="{{ asset($value->image) }}" alt="" />
                                    </a>
                                </div>
                                <!-- slider item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-container">

            <div class="filter-group">


                <div class="filter_field_grid">
                    <div class="form-group">
                        <select class="filter-select">
                            <option>Select Religion</option>
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Christian</option>
                            <option>Buddhist</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <div class="age-range">
                            <input type="number" class="age-input" value="22">
                            <span style="color: #fff">to</span>
                            <input type="number" class="age-input" value="27">
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="filter-select">
                            <option>Select Living Country</option>
                            <option>Bangladesh</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Canada</option>
                            <option>Australia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="filter-select">
                            <option>Select Profession</option>
                            <option>Teacher</option>
                            <option>Doctor</option>
                            <option>House wife</option>
                            <option>Canada</option>
                        </select>
                    </div>
                    <button class="lets-begin-btn">Let's Begin</button>
                </div>
            </div>
        </div>
    </section>

    
{{-- <section class="registration_process">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="process_btn">
                    <div class="register_btn_section">
                        <a href="{{ route('customer.register') }}" class="register_btn">
                            Create an Online Account
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="process_btn">
                    <div class="register_btn_section">
                        <a href="{{ route('customer.register') }}" class="register_btn">
                            Create an Ofline Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="how-it-works">
    <div class="container">
        <h2 style="padding: 0; color:#08b962" class="section_title">How It Works?</h2>
        <div class="steps-wrapper">
            <div class="step-box">
                <div class="step-icon">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </div>
                <h3>Sign Up</h3>
                <p>Create your free profile by filling up your personal details and upload your photo.</p>
            </div>
            <div class="step-box">
                <div class="step-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h3>Connect</h3>
                <p>Search & Connect with genuine profiles based on your preferences.</p>
            </div>
            <div class="step-box">
                <div class="step-icon">
                    <i class="fa-solid fa-file-video"></i>
                </div>
                <h3>Interact</h3>
                <p>Start interacting with your matches through our secure communication system.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="process_btn">
                    <div class="register_btn_section">
                        <a href="{{ route('customer.register') }}" class="register_btn">
                            Create an Online Account
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="process_btn">
                    <div class="register_btn_section">
                        <a href="{{ route('customer.register') }}" class="register_btn">
                            Create an Ofline Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="free_facility_section section-padding">
        <div class="container">
            <div class="facility_heading">
                <h2>Why Choose Us?</h2>
                <p>"If you are unable to find your perfect life partner or can't afford to marry,
                    <strong>We are here to help you with a kind heart."</strong>
                </p>
                <p>Your happiness is our responsibility ❤️</p>
            </div>

            <div class="facility_items">
                <div class="facility_card">
                    <i class="fas fa-phone"></i>
                    <h3>Trusted Matrimony Platform</h3>
                    <p>Get in touch with our support team and explain your situation.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3>100% Verified Profiles</h3>
                    <p>Your profile will be approved for free if your request is genuine.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-user-check"></i>
                    <h3>Privacy & Security Assured</h3>
                    <p>Connect with suitable matches without any charges.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-envelope"></i>
                    <h3>Personalized Matchmaking Assistance</h3>
                    <p>We provide direct email support for those who can't afford our services.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-envelope"></i>
                    <h3>Dedicated Customer Support</h3>
                    <p>We provide direct email support for those who can't afford our services.</p>
                </div>

            </div>

            <div class="facility_contact">
                <a href="contact" class="btn_facility">Apply for Free Service</a>
            </div>
        </div>
    </section>

    {{-- <section class="free_facility_section section-padding">
        <div class="container">
            <div class="facility_heading">
                <h2>Free Facilities for Poor People</h2>
                <p>"If you are unable to find your perfect life partner or can't afford to marry,
                    <strong>We are here to help you with a kind heart."</strong>
                </p>
                <p>Your happiness is our responsibility ❤️</p>
            </div>

            <div class="facility_items">
                <div class="facility_card">
                    <i class="fas fa-phone"></i>
                    <h3>Talk to Support</h3>
                    <p>Get in touch with our support team and explain your situation.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h3>Free Profile Approval</h3>
                    <p>Your profile will be approved for free if your request is genuine.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-user-check"></i>
                    <h3>Unlimited Contact Access</h3>
                    <p>Connect with suitable matches without any charges.</p>
                </div>

                <div class="facility_card">
                    <i class="fas fa-envelope"></i>
                    <h3>Direct Email Support</h3>
                    <p>We provide direct email support for those who can't afford our services.</p>
                </div>
            </div>

            <div class="facility_contact">
                <a href="contact" class="btn_facility">Apply for Free Service</a>
            </div>
        </div>
    </section> --}}

    <section class="client_success_story section-padding">
        <div class="container">
            <h2 class="section_title">Matrimony Success Stories</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="sucess_storyslider owl-carousel">
                        @foreach ($sliders as $key => $value)
                            <div class="story-item">
                                <div class="story-img">
                                    <img src="{{ asset($value->image) }}" alt="Groom">
                                </div>
                                <div class="story-content">
                                    <p>"We are truly grateful to Matrimony for connecting us together."</p>
                                    <h4>Hasan & Rima</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--========== why choose us section ==========--}}

    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="why-choose-wrapper">
                <div class="image-part">
                    <img src="{{ asset('public/frontEnd/images/whychoose.png') }}" alt="Why Choose Us" />
                </div>
                <div class="whychoos_point">
                    <h2 class="section_title">Why Choose Us?</h2>
                    <ul>
                        <li><i class="icon">✔</i> Trusted Matrimony Platform</li>
                        <li><i class="icon">✔</i> 100% Verified Profiles</li>
                        <li><i class="icon">✔</i> Privacy & Security Assured</li>
                        <li><i class="icon">✔</i> Personalized Matchmaking Assistance</li>
                        <li><i class="icon">✔</i> Seamless Communication Features</li>
                        <li><i class="icon">✔</i> Dedicated Customer Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="safety-security-tips">
        <div class="container">
            <h2 class="section_title">Safety & Security Tips</h2>
            <div class="security-wrapper">
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/lock.png') }}" alt="Lock Profile">
                    </div>
                    <h3>Lock Your Profile</h3>
                    <p>Use the **Profile Lock** feature to hide your personal information from unauthorized users.</p>
                </div>
    
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/chat.png') }}" alt="Chat Carefully">
                    </div>
                    <h3>Don't Share Personal Information</h3>
                    <p>Never share your **Phone Number, Address, or Bank Details** without your permission.</p>
                </div>
    
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/report.png') }}" alt="Report Users">
                    </div>
                    <h3>Report Suspicious Profiles</h3>
                    <p>If you find any **fake profile** or suspicious user, report them to our support team.</p>
                </div>
    
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/verify.png') }}" alt="Verified Profiles">
                    </div>
                    <h3>Connect with Verified Profiles</h3>
                    <p>Only communicate with **100% Verified Profiles** for better safety.</p>
                </div>
    
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/meet.png') }}" alt="Meet Safely">
                    </div>
                    <h3>Meet in Public Places</h3>
                    <p>Always arrange your first meeting in a **Public Place** to ensure your safety.</p>
                </div>
    
                <div class="security-step">
                    <div class="icon">
                        <img src="{{ asset('public/frontEnd/images/privacy.png') }}" alt="Privacy Control">
                    </div>
                    <h3>Privacy Control Settings</h3>
                    <p>Use our **Privacy Settings** to control who can see your profile and photos.</p>
                </div>
            </div>
        </div>
    </section>
    

    {{-- <section class="security-tips">
        <div class="container">
            <h2>Safety & Security tips</h2>
            <p><strong>Follow these tips to stay safe in your matchmaking journey</strong></p>
            <p>
                Explore Matrimony.com's Safe Matrimony initiative. Beware of online matrimonial frauds; Be cautious
                during your journey. Find more details below.
            </p>

            <h3>How to stay safe</h3>

            <div class="security-cards">
                <div class="card">
                    <div class="card-image">
                        <img src="images/icon-1.png" alt="Safe Public Meeting">
                    </div>
                    <p>Meet an interested member only in a safe public place. Inform your family/friends about the meeting
                    </p>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="https://imgs.bharatmatrimony.com/webapp-assets/revamp-images/newsafety2.png"
                            alt="OTP Security">
                    </div>
                    <p>Never share your OTP, account password, or account details with anyone</p>
                </div>

                <div class="card">
                    <div class="card-image">
                        <img src="images/icon-3.png" alt="Unknown Numbers">
                    </div>
                    <p>Beware of members who call you from different numbers and don't give you a proper contact no</p>
                </div>
            </div>
        </div>
    </section> --}}

<section class="why-choose-us section-padding">
    <div class="container">
        <div class="why-choose-wrapper">
            <div class="whychoos_point">
                <h2 style="color: #08b962" class="section_title">How to Create an account?</h2>
                <ul>
                    <li><i class="icon">✅</i> Visit Registration Page</li>
                    <li><i class="icon">✅</i> Fill Basic Information</li>
                    <li><i class="icon">✅</i> Verify Your Account</li>
                    <li><i class="icon">✅</i> Complete Profile</li>
                    <li><i class="icon">✅</i> Profile Locking</li>
                    <li><i class="icon">✅</i> Seamless Communication Features</li>
                </ul>
            </div>
            <div class="image-part">
                <img src="{{ asset('public/frontEnd/images/create_pro.webp') }}" alt="Why Choose Us" />
            </div>
        </div>
        <div class="cta-section">
            <div class="register_btn_section">
                <a href="{{ route('customer.register') }}" class="register_btn">
                    Registration Now
                </a>
            </div>
            <p class="support-text">Need help? <a href="#">Chat with our support team</a></p>
        </div>
    </div>
</section>


    <section class="pricing-section">
        <div class="pricing-container">
            <h2 style="padding: 0" class="section_title">Find Your Perfect Match</h2>
            <p class="section-subtitle">Start your journey with our flexible membership options</p>

            <div class="pricing-grid">
                <!-- Free Plan -->
                <div class="pricing-card free-plan">
                    <div class="plan-header">
                        <h3>Starter Plan</h3>
                        <div class="price">FREE<span class="duration">forever</span></div>
                    </div>
                    <ul class="features-list">
                        <li><i class="fas fa-search"></i> Unlimited Profile Search</li>
                        <li><i class="fas fa-heart"></i> Basic Match Suggestions</li>
                        <li><i class="fas fa-image"></i> Photo Gallery Access</li>
                        <li><i class="fas fa-comment"></i> Limited Messaging</li>
                    </ul>
                    <button class="plan-cta">Get Started</button>
                </div>

                <!-- Premium Plan -->
                <div class="pricing-card premium-plan">
                    <div class="plan-badge">Most Popular</div>
                    <div class="plan-header">
                        <h3>Premium Connection</h3>
                        <div class="price">$29<span class="duration">/month</span></div>
                    </div>
                    <ul class="features-list">
                        <li><i class="fas fa-bolt"></i> Advanced Match Algorithm</li>
                        <li><i class="fas fa-lock-open"></i> Full Profile Access</li>
                        <li><i class="fas fa-video"></i> Video Chat Feature</li>
                        <li><i class="fas fa-star"></i> Priority Listing</li>
                        <li><i class="fas fa-shield-alt"></i> Enhanced Privacy</li>
                    </ul>
                    <button class="plan-cta">Upgrade Now</button>
                </div>

                <!-- VIP Plan -->
                <div class="pricing-card vip-plan">
                    <div class="plan-header">
                        <h3>VIP Experience</h3>
                        <div class="price">$99<span class="duration">/month</span></div>
                    </div>
                    <ul class="features-list">
                        <li><i class="fas fa-gem"></i> Personal Matchmaker</li>
                        <li><i class="fas fa-check-double"></i> Verified Profiles Only</li>
                        <li><i class="fas fa-concierge-bell"></i> 24/7 Priority Support</li>
                        <li><i class="fas fa-gift"></i> Exclusive Event Access</li>
                        <li><i class="fas fa-plane"></i> Date Planning Service</li>
                    </ul>
                    <button class="plan-cta">Go Premium</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <h2 style="padding:0" class="section_title">Membership</h2>
        <p style="text-align:center;">Primarily it's free to search any profiles. <strong>Upgrade</strong> for customized search and better connection.
        </p>

        <div class="plans">
            <div class="plan free">
                <h2>FREE</h2>
                <ul>
                    <li><i>✔</i> Search Profiles</li>
                    <li><i>✔</i> Shortlist & Send Interest</li>
                    <li><i>✔</i> Photo Album</li>
                    <li><i>✖</i> Chat & Messaging</li>
                    <li><i>✖</i> View contacts of members you like</li>
                    <li><i>✖</i> Priority customer support</li>
                    <li><i>✖</i> Profile Boost</li>
                </ul>
                <button>Free Register</button>
            </div>

            <div class="plan paid">
                <h2>PAID</h2>
                <ul>
                    <li><i>✔</i> Search Profiles</li>
                    <li><i>✔</i> Shortlist & Send Interest</li>
                    <li><i>✔</i> Photo Album</li>
                    <li><i>✔</i> Chat & Messaging</li>
                    <li><i>✔</i> View contacts of members you like</li>
                    <li><i>✔</i> Priority customer support</li>
                    <li><i>✔</i> Profile Boost</li>
                </ul>
                <button>Browse Plan</button>
            </div>
        </div>
    </section>


    <div class="register_btn_section">
        <a href="{{ route('customer.register') }}" class="register_btn">
            Registration Now
        </a>
    </div>


    <div class="footer-gap"></div>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            // main slider 
            $(".main_slider").owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                nav: true,
                autoplayHoverPause: false,
                margin: 0,
                mouseDrag: true,
                smartSpeed: 8000,
                autoplayTimeout: 3000,

                navText: ["<i class='fa-solid fa-angle-left'></i>",
                    "<i class='fa-solid fa-angle-right'></i>"
                ],
            });

            $(".sucess_storyslider").owlCarousel({
                margin: 15,
                loop: true,
                dots: false,
                nav: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,

                navText: ["<i class='fa-solid fa-angle-left'></i>",
                    "<i class='fa-solid fa-angle-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 3,
                    },
                },
            });

            $(".product_slider").owlCarousel({
                margin: 10,
                items: 5,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: false,
                    },
                    600: {
                        items: 5,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: false,
                    },
                },
            });
        });
    </script>
@endpush
