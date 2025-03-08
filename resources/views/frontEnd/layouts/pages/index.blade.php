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
                    <div class="filter_item_box">
                        <div class="form-group">
                            <select class="filter-select">
                                <option>Select Religion</option>
                                <option>Islam</option>
                                <option>Hindu</option>
                                <option>Christian</option>
                                <option>Buddhist</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="age-range">
                                <input type="number" class="age-input" value="22">
                                <span style="color: #fff">to</span>
                                <input type="number" class="age-input" value="27">
                            </div>
                        </div>
                    </div>

                    <div class="filter_item_box">
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
                    </div>
                </div>
                <div class="filter_item_box">
                    <button class="lets-begin-btn">Let's Begin</button>
                </div>
            </div>
        </div>

    </section>


    <section class="mobile_banner">
        <img src="{{asset('frontEnd/images/heart-1024x923.png')}}" alt="">
        <div class="banner_bg" style="background: url('{{ asset($sliderrightads->image) }}') no-repeat center center; background-size: cover; height:450px">
            <h2>Bangladeshi Most Trusted And Secure Matrimonial platform</h2>
        </div>

        <section class="search-section">
           
            <div class="container">
              <div class="search-box">
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
    

    <section>
        <div class="container">

            <div class="free_registration_section">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="free_reg_left wow fadeInLeft">
                            <div class="process_btn">
                                <h5 class="register_slogan">আপনার গোপনীয়তা সুরক্ষিত রেখে পাত্র/পাত্রী খুজতে নিচের লিংকে
                                    ক্লিক করুন।</h5>
                                <div class="register_btn_section">
                                    <a href="{{ route('customer.register') }}">
                                        Create an Online Profile Register Free
                                    </a>
                                    {{-- <a href="{{ route('customer.register') }}" class="animationBtn2">
                                        Create an Online Profile Register Free
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="free_reg_right wow fadeInRight">
                            <div class="process_btn">
                                <h5 style="color:#000" class="register_slogan">আপনার গোপনীয়তা সুরক্ষিত রেখে,অনলাইনে নিজের
                                    প্রোফাইল না দেখিয়ে পাত্র/পাত্রী খুজতে নিচের লিংকে ক্লিক করুন।</h5>
                                <div class="register_btn_section">
                                    <a href="{{ route('customer.register') }}">
                                        Create an Ofline Profile Register Free
                                    </a>
                                    {{-- <a href="{{ route('customer.register') }}" class="animationBtn3">
                                        Create an Ofline Profile Register Free
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
         <h2 class="section_title title_pd">How It Works?</h2>
             <div class="steps-wrapper">
                 <div class="step-box  wow fadeOut" data-wow-duration="1.2s" data-wow-delay="0.2s">
                     <div class="step-icon">
                         <i class="fa-solid fa-right-to-bracket"></i>
                     </div>
                     <h3>Register</h3>
                     <p>Register to our website, fill up your profile completely, and put a beautiful image on your profile.</p>
                 </div>
                 <div class="step-box  wow fadeOutUp" data-wow-duration="1.3s" data-wow-delay="0.4s">
                     <div class="step-icon">
                         <i class="fa-solid fa-user"></i>
                     </div>
                     <h3>Find Your Partner</h3>
                     <p>Search your interests that you like. You'll also be recommended users based on your preferences.</p>
                 </div>
                 <div class="step-box  wow fadeOutUp" data-wow-duration="1.4s" data-wow-delay="0.6s">
                     <div class="step-icon">
                         <i class="fa-solid fa-file-video"></i>
                     </div>
                     <h3>Connect</h3>
                     <p>Add friends, approach them, and chat with them. Be sure to share your audio, photo, and video too.</p>
                 </div>
             </div>
             </div>

             <div class="howit_works_btn">
                <a href="">Let's Start</a>
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
  document.getElementById('brideBtn').addEventListener('click', function () {
    this.classList.add('active');
    document.getElementById('groomBtn').classList.remove('active');
  });

  document.getElementById('groomBtn').addEventListener('click', function () {
    this.classList.add('active');
    document.getElementById('brideBtn').classList.remove('active');
  });
</script>
@endpush
