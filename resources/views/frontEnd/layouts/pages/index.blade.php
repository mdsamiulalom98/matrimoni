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
            <form action="{{ route('members') }}" method="GET">
                <div class="filter-group">
                    <div class="filter_field_grid">
                        <div class="filter_item_box">
                            <div class="form-group">
                                <select class="filter-select" name="religion_id">
                                    <option value="">Select Religion</option>
                                    @foreach ($religions as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="age-range">
                                    <input type="number" name="from" class="age-input" value="22">
                                    <span style="color: #fff">to</span>
                                    <input type="number" name="to" class="age-input" value="27">
                                </div>
                            </div>
                        </div>

                        <div class="filter_item_box">
                            <div class="form-group">
                                <select class="filter-select" name="country_id">
                                    <option>Select Living Country</option>
                                    @foreach ($countries as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="filter-select" name="profession_id">
                                    <option value="">Select Profession</option>
                                    @foreach ($professions as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="filter_item_box">
                        <button id="openPopup1" class="lets-begin-btn">Let's Begin</button>
                    </div>
                </div>
            </form>
        </div>

    </section>

    <section class="mobile_banner">
        <img src="{{ asset('frontEnd/images/heart-1024x923.png') }}" alt="">
        <div class="banner_bg"
            style="background: url('{{ asset($sliderrightads->image) }}') no-repeat center center; background-size: cover; height:540px; width: 100%;">
            <h2>Bangladeshi Most Trusted And Secure Matrimonial platform</h2>
        </div>

        <section class="search-section">

            <div class="container">
                <div class="search-box">
                    <h6 style="color:#fff">Looking for</h6>
                    <div class="search-toggle">
                        <button class="toggle-btn active" id="brideBtn">Bride</button>
                        <button class="toggle-btn" id="groomBtn">Groom</button>
                    </div>
                    <form>
                        <div class="form-group">
                            <div class="mobile_filter_flex">
                                <div class="m_filter_left">
                                    <label>Age</label>
                                    <div class="age-box">
                                        <select>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                        </select>
                                        <span>to</span>
                                        <select>
                                            <option>35</option>
                                            <option>40</option>
                                            <option>45</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="m_filter_right">
                                    <label>Religion</label>
                                    <select>
                                        <option>- Any -</option>
                                        <option>Islam</option>
                                        <option>Hindu</option>
                                        <option>Christian</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="search-btn">Search Partner</button>
                    </form>
                </div>
            </div>
        </section>
    </section>
    
    
<section class="section_d"></section>
  <section class = "home_login">
      <div class="container">
    <div class="top-bar">
      <span class="close"></span>
      <span class="help">Up To 70% Discount if Verified After Profile Completed</span>
    </div>
<form action="{{ route('user.login') }}" method="POST">
    @csrf
    <div class="login-box">
          <div class="input-group">
            <input type="text" name="phone" placeholder="Email Address / Phone Number" required>
            <span class="icon"></span>
          </div>
    
          <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
            <span class="icon eye"><i class="fa-regular fa-eye"></i></span>
          </div>
    
          <div class="forgot">
            <a href="#">Forgot Password?</a>
          </div>
          <div class="form_group">
            <div class="">
              <span style="color:#000; font-weight:700; padding:3px 0px" class="join_agree">  <input type="checkbox" name="is_agent"> Are You Agent?</span>
            </div>
          </div>
    
            <button type="submit" class="signin">Sign In</button>
            <div class="divider">Or</div>
          <div class="signup-text">
            Don't have an account? <a href="#">Sign Up</a>
          </div>
        </div>
</form>
      </div>
  </section>


    <section class="free_registration_section">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="free_reg_left wow fadeInLeft">
                            <div class="process_btn">
                                <div class="reg_title_flex">
                                    <img src="{{ asset('public/frontEnd/images/online_reg.png') }}" alt="">
                                    <strong>Create an Online Profile </strong>
                                </div>
                                <h5 class="register_slogan">আপনার গোপনীয়তা সুরক্ষিত রেখে পাত্র/পাত্রী খুজতে নিচের লিংকে
                                    ক্লিক করুন।</h5>
                                <div class="register_btn_section">
                                    <a href="{{ route('member.register') }}">
                                        Register Free<i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="free_reg_right wow fadeInRight">
                            <div class="process_btn">
                                <div class="reg_title_flex">
                                  <img src="{{ asset('public/frontEnd/images/ofline_reg.png') }}" alt="">
                                  <strong> Create an Ofline Profile</strong>
                               </div>
                                <h5 style="color:#000" class="register_slogan">আপনার গোপনীয়তা সুরক্ষিত রেখে,অনলাইনে নিজের
                                    প্রোফাইল না দেখিয়ে পাত্র/পাত্রী খুজতে নিচের লিংকে ক্লিক করুন।</h5>
                                <div class="register_btn_section">
                                    {{-- <a href="{{ route('member.registerOfline') }}"> --}}
                                    <a href="{{ route('member.register') }}">
                                        Register Free<i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="appointment_section">
        <div class="container">
            <div class="appointmetn_area">
                <h3>Meet For Free To Get Any Marriage Related Advice.</h3>
                <span>
                    <a href="#">Book Appointment</a>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </span>
            </div>
        </div>
        </div>
    </section>

    <section class="how-it-works section-padding">
        <div class="container">
            <h2 class="how-works-slogan title_pd">Join Our Affiliate Program Now</h2>
            <p class="how-works-slogan2">Create your agent account to earn money</p>
            <div class="register_btn_section how-works-regfree">
                <a href="{{ route('joinAgent') }}">
                    Register Free <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
            <a href="{{route('affiliate.policy')}}">Read More <i class="fa-solid fa-chevron-right"></i></a>
            <section class="section_d sec_d_top"></section>
            <h2 class="section_title title_pd">How It Works?</h2>
            <div class="steps-wrapper">
                <div class="step-box  wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay="0.2s">
                    <div class="step-icon">
                        <i class="fa-solid fa-right-to-bracket"></i>
                    </div>
                    <h3>Register</h3>
                    <p>Register to our website, fill up your profile completely, and put a beautiful image on your profile.
                    </p>
                </div>
                <div class="step-box  wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay="0.4s">
                    <div class="step-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3>Find Your Partner</h3>
                    <p>Search your interests that you like. You'll also be recommended users based on your preferences.</p>
                </div>
                <div class="step-box  wow fadeInLeft" data-wow-duration="1.4s" data-wow-delay="0.6s">
                    <div class="step-icon">
                        <i class="fa-solid fa-file-video"></i>
                    </div>
                    <h3>Connect</h3>
                    <p>Add friends, approach them, and chat with them. Be sure to share your audio, photo, and video too.
                    </p>
                </div>
            </div>
        </div>

        <div class="howit_works_btn">
            <a href="">Let's Start</a>
        </div>
        </div>
    </section>
    

    <section class="client_success_story section-padding">
        <div class="container">
            <h2 style="padding: 10px 0" class="section_title">Matrimony Success Stories</h2>
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

    <section class="safety-security-tips section-padding">
        <div class="container">
            <div class="safety-container">
                <h2 class="section_title">Safety & Security Tips</h2>
                <div class="tips-wrapper">
                    <div class="tip-item">
                        <div class="tip-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="tip-content">
                            <h4>Protect Your Privacy</h4>
                            <p>Never share personal information like passwords or bank details with strangers.</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="tip-content">
                            <h4>Strong Passwords</h4>
                            <p>Always use strong and unique passwords to secure your online accounts.</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="tip-content">
                            <h4>Verify Identity</h4>
                            <p>Ensure to verify identities before engaging in any personal or business conversations.</p>
                        </div>
                    </div>
                    <div class="tip-item">
                        <div class="tip-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="tip-content">
                            <h4>Contact Support</h4>
                            <p>If you feel suspicious, contact our support team for assistance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="why-choose-wrapper">
                <div class="whychoos_point">
                    <h2 class="section_title">How to Create an account?</h2>
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
        </div>
    </section>




    <section class="memberPrice_plan_section section-padding">
       <div class="container">
            <h2 style="padding:0" class="section_title">Membership</h2>
            <p style="text-align:center;">Primarily it's free to search any profiles. <strong>Upgrade</strong> for customized
                search and better connection.
            </p>

            <div class="plans">
                <div class="plan free wow fadeInLeft">
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

                <div class="plan paid wow fadeInRight">
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
       </div>
    </section>
    


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
                dots: true,
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

    <script>
        document.getElementById('brideBtn').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('groomBtn').classList.remove('active');
        });

        document.getElementById('groomBtn').addEventListener('click', function() {
            this.classList.add('active');
            document.getElementById('brideBtn').classList.remove('active');
        });
    </script>

@endpush
