<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title') - {{$generalsetting->name}}</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" alt="Websolution IT" />
        <meta name="author" content="Websolution IT" />
        <link rel="canonical" href="" />
        @stack('seo') @stack('css')
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/animate.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/select2.min.css')}}" />
        <!-- toastr css -->
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/assets/css/toastr.min.css" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/wsit-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css?v=1.0.1')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css?v=1.0.1')}}" />
        <script src="{{asset('public/frontEnd/js/jquery-3.7.1.min.js')}}"></script>
        @foreach($pixels as $pixel)
        <!-- Facebook Pixel Code -->
     <script>
        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(), event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;
            j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5SNPBGHB');
    </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1" />
        </noscript>
        @endforeach
    </head>

    <body class="gotop">
        <div  class="coupon-section alert alert-dismissible fade show" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="header_top">
                           <div class="header_top_left">
                            <ul>
                                <li><a href="#"><i class="fa-solid fa-phone-volume"></i> 017386203858</a></li>
                                <li><a href="#"><i class="fa-solid fa-envelope"></i> info@gmail.com</a></li>
                                <li><a href="#"><i class="fa-brands fa-whatsapp"></i> 017xxxxxxxxxx</a></li>
                              </ul>
                           </div>

                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="header_top_right">
                            <marquee direction="right">"বিয়ের সেতু, হৃদয়ের মেলবন্ধন – আপনার ভালোবাসার যাত্রা শুরু হোক এখানেই।"</marquee>
                           </div>
                    </div>
                </div>
            </div>
        </div>
        @php $subtotal = Cart::instance('shopping')->subtotal(); @endphp
        <div class="mobile-menu">
            <div class="mobile-menu-logo">
                <div class="logo-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbu4iYKmGIVfk6MYPuiklZP4DEy_BA2DjVDA&s" alt="" />
                    {{-- <img src="{{asset($generalsetting->dark_logo)}}" alt="" /> --}}
                </div>
                <div class="mobile-menu-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="mobilemenu-bottom">
                <ul>
                    <li><a href="{{route('home')}}">home</a></li>
                    <li><a href="{{route('members')}}">Members</a></li>
                    <li><a href="{{route('packages')}}">Package</a></li>
                    <li><a href="{{route('packages')}}">Appointment</a></li>
                    <li><a href="{{route('aboutUs')}}">About Us</a></li>
                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                </ul>
            </div>
        </div>
         <header id="navbar_top">
            <!-- mobile header start -->
            <div class="mobile-header sticky">
                <div class="mobile-logo">
                    <div class="menu-bar">
                        <a class="toggle">
                            {{-- <i class="fa-solid fa-bars"></i> --}}
                            <img src="{{ asset('public/frontEnd/images/menu_icon.png') }}" alt="">
                        </a>
                    </div>
                    <div class="menu-logo">
                        <img src="{{ asset('public/frontEnd/images/site-logo.png') }}" alt="">
                        {{-- <div class="mobile_header_search">
                            <div class="search_bar">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <input type="text" placeholder="Find Your Favorite Bride and Groom....">
                            </div>

                        </div> --}}
                    </div>

                     <div class="menu-bag">
                        <a href="{{route('member.login')}}">
                            <i id="m_login" class="fa-regular fa-user"></i>
                        </a>
                       <a href="#" class="margin-shopping">
                        <i class="fa-regular fa-bell"></i>
                            <span class="mobilecart-qty">5</span>
                        </a>

                    </div>
                </div>
            </div>


            <!-- main header start -->
            <div class="main-header">
                <div class="logo-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="logo-header">
                                    <div class="main-logo">
                                        {{-- <a href="{{route('home')}}"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbu4iYKmGIVfk6MYPuiklZP4DEy_BA2DjVDA&s" alt="" /></a> --}}
                                        <a href="{{route('home')}}"><img src="{{asset($generalsetting->dark_logo)}}" alt="" /></a>
                                    </div>
                                    <div class="menu_area">
                                        <ul>
                                            <li><a href="{{route('home')}}">home</a></li>
                                            <li><a href="{{route('members')}}">Members</a></li>
                                            <li><a href="{{route('packages')}}">Package</a></li>
                                            <li><a href="{{route('packages')}}">Appointment</a></li>
                                            <li><a href="{{route('aboutUs')}}">About Us</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                    <div class="header_righ">
                                        {{-- <a class="btn_comm" href="#"><i class="fa-solid fa-user"></i> Registration now</a> --}}
                                        <a class="btn_comm2" href="{{route('member.login')}}"><i class="fa-solid fa-user"></i> Login now</a>
                                        <a class="btn_comm" href="{{route('agentAC')}}"><i class="fa-solid fa-handshake-angle"></i> Join as Agent</a>
                                        {{-- <a class="btn_comm" href="{{route('joinAgent')}}"><i class="fa-solid fa-handshake-angle"></i> Join as Agent</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- logo area end -->


                <!-- menu area end -->
            </div>
            <!-- main-header end -->
        </header>
        <div id="content">
            @yield('content')
        </div>
        <!-- content end -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="footer-about">
                                <a href="{{route('home')}}">
                                    {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbu4iYKmGIVfk6MYPuiklZP4DEy_BA2DjVDA&s" alt="" /> --}}
                                    <img src="{{asset($generalsetting->dark_logo)}}" alt="" />
                                </a>
                                <p>{{$contact->address}}</p>
                                <p><a href="tel:{{$contact->hotline}}" class="footer-hotlint">{{$contact->hotline}}</a></p>
                                <p><a href="mailto:{{$contact->hotmail}}" class="footer-hotlint">{{$contact->hotmail}}</a></p>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-3">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title "><a>Useful Link</a></li>
                                    @foreach($pages as $page)
                                    <li><a href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-2">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Member Link</a></li>
                                    <li><a href="{{route('member.register')}}">Register</a></li>
                                    <li><a href="{{route('member.login')}}">Login</a></li>
                                    <li><a href="{{route('member.forgot.password')}}">Forgot Password?</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- col end -->
                        <div class="col-sm-3">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title text-center"><a>Follow Us</a></li>
                                </ul>
                                <ul class="social_link">
                                    @foreach($socialicons as $value)
                                    <li>
                                        <a  href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul>
                                    <li class="title text-center mb-0"><a class="mb-0">Delivery Partner</a></li>
                                    <li class="delivery-partner">
                                        <img src="{{asset('public/frontEnd/images/delivery-partner.png')}}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="copyright">
                                <p>Copyright © {{ date('Y') }} {{$generalsetting->name}}. All rights reserved. Developed By <a href="https://websolutionit.com">Websolution IT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--=====-->
        <div class="fixed_whats">
            <a href="https://api.whatsapp.com/send?phone={{$contact->whatsapp}}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        </div>

        <div class="scrolltop" style="">
            <div class="scroll">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>

        <!-- /. fixed sidebar -->

        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading"><div class="custom-loader"></div></div>
        <script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wsit-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu-init.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>
         <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="{{asset('public/frontEnd/js/script.js')}}"></script>
        <script>
            new WOW().init();
        </script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        @stack('script')

        <!-- cart js start -->
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "{{route('districts')}}",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            var menu = new MmenuLight(document.querySelector("#menu"), "all");

            var navigator = menu.navigation({
                selectedClass: "Selected",
                slidingSubmenus: true,
                // theme: 'dark',
                title: "ক্যাটাগরি",
            });

            var drawer = menu.offcanvas({
                // position: 'left'
            });
            document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
                evnt.preventDefault();
                drawer.open();
            });
        </script>

        <script>
            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $(".scrolltop:hidden").stop(true, true).fadeIn();
                } else {
                    $(".scrolltop").stop(true, true).fadeOut();
                }
            });
            $(function () {
                $(".scroll").click(function () {
                    $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
                    return false;
                });
            });
        </script>
        <script>
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 100) {
                    $('.logo-area').addClass('fixed-top');
                    $('.mobile-menu').addClass('fixed-top');
                    $('.mobile-header').addClass('fixed-top');
                } else {
                    $('.logo-area').removeClass('fixed-top');
                    $('.mobile-menu').removeClass('fixed-top');
                    $('.mobile-header').removeClass('fixed-top');
                }
            });
        </script>
        <script>
            $(".filter_btn").click(function () {
                $(".filter_sidebar").addClass("active");
                $("body").css("overflow-y", "hidden");
            });
            $(".filter_close").click(function () {
                $(".filter_sidebar").removeClass("active");
                $("body").css("overflow-y", "auto");
            });
        </script>

        <script>
            $(document).ready(function () {
                $(".logoslider").owlCarousel({
                    margin: 0,
                    loop: true,
                    dots: false,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    animateOut: "fadeOut",
                    animateIn: "fadeIn",
                    smartSpeed: 3000,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false,
                            dots: false,
                        },
                        600: {
                            items: 1,
                            nav: false,
                            dots: false,
                        },
                        1000: {
                            items: 1,
                            nav: false,
                            loop: true,
                            dots: false,
                        },
                    },
                });
            });
        </script>
        <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>

        <!-- Google Tag Manager (noscript) -->
        <!--@foreach($gtm_code as $gtm)-->
        <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-{{$gtm->code}}" height="0" width="0" style="display: none; visibility: hidden;"></iframe></noscript>-->
        <!-- End Google Tag Manager (noscript) -->
        <!--@endforeach-->

             <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5SNPBGHB"
                height="0" width="0" style="display:none;visibility:hidden">
        </iframe>
    </noscript>

        <script>
            function copyCouponCode() {
                var couponCode = document.getElementById("couponCode").innerText;
                var tempInput = document.createElement("input");
                tempInput.value = couponCode;
                document.body.appendChild(tempInput);
                tempInput.select();
                tempInput.setSelectionRange(0, 99999);
                document.execCommand("copy");
                document.body.removeChild(tempInput);
                toastr.success('Coupon Code copied successfully!');
            }
        </script>
         <script>
            // Automatically open the first popup when the page loads
            window.onload = function () {
                document.getElementById("popup1").style.display = "flex";
            };

            // Close Popup
            function closePopup(step) {
                document.getElementById("popup" + step).style.display = "none";
            }

            // Next Popup
            function nextPopup(current, next) {
                document.getElementById("popup" + current).style.display = "none";
                document.getElementById("popup" + next).style.display = "flex";
            }

            // Previous Popup
            function prevPopup(current, prev) {
                document.getElementById("popup" + current).style.display = "none";
                document.getElementById("popup" + prev).style.display = "flex";
            }


        </script>
    </body>
</html>
