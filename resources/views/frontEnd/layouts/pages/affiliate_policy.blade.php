@extends('frontEnd.layouts.master')
@section('title', "Affiliate Policy")
@section('content')
<section class="affiliate_policy_section section-padding">
    <div class="container">
        <div class="row">

            <div class="affiliate_banner">
                <img src="https://visme.co/blog/wp-content/uploads/2021/05/how-to-make-a-banner-header-wide.png" alt="">
            </div>

            <div class="affiliate_why_work">
                <h3>Why Work With Bibah Seba</h3>
                <div class="why_w_box">
                    <div class="why_wBox">
                        <i class="fa fa-phone"></i>
                        <span>Unlimited Earning Potential</span>
                    </div>
                    <div class="why_wBox">
                        <i class="fa fa-phone"></i>
                        <span>Promote your Account</span>
                    </div>
                </div>
            </div>
           

            <div class="affiliate-main-box">
                <h2>How Dose it Work</h2>
                <div class="step-affiliate">
            
                  <div class="affiliate-box">
                    <i class="fas fa-user-plus"></i>
                    <h4>Register</h4>
                    <p>Create your affiliate account.</p>
                  </div>
            
                  <div class="affiliate-box">
                    <i class="fas fa-users-cog"></i>
                    <h4>Create Agent</h4>
                    <p>Fill in agent details and submit.</p>
                  </div>
            
                  <div class="affiliate-box">
                    <i class="fas fa-chart-line"></i>
                    <h4>Start Earning</h4>
                    <p>Track performance & get rewards.</p>
                  </div>
            
                </div>

                <div class="login-box mt-5">
                    <div class="input-group">
                      <input type="email" placeholder="Email Address / Phone Number" required>
                      <span class="icon"></span>
                    </div>
              
                    <div class="input-group">
                      <input type="password" placeholder="Password" required>
                      <span class="icon eye"><i class="fa-regular fa-eye"></i></span>
                    </div>
              
                    <div class="forgot">
                      <a href="#">Forgot Password?</a>
                    </div>
              
                      <button class="signin">Sign In</button>
                      <div class="divider">Or</div>
                    <div class="signup-text">
                      Don't have an account? <a href="#">Sign Up</a>
                    </div>
                  </div>
                </div>
            
                <div class="policy-description">
                  <strong>Affiliate Policy:</strong> Once your agent is approved, they can start referring users through their unique link. You will receive a percentage commission from each successful registration or purchase made by the referred users. Misuse or spamming may lead to account suspension.
                </div>
              </div>

            
        </div>
    </div>
</section>
@endsection