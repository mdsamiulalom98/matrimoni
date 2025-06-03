@extends('frontEnd.layouts.master')
@section('title', 'Packages')

@section('content')


    <section class="pricing-section ">
        <div class="container">
            <h2 style="padding: 0" class="section_title">Find Your Perfect Match</h2>
            <p class="section-subtitle">Start your journey with our flexible membership options</p>
            <div class="row">
                <div class="pricing-container">
                    <div class="pricing-grid">
                        <!-- Free Plan -->
                        @foreach ($packages as $key => $value)
                            <div class="pricing-card free-plan">
                                @if ($value->popular == 1)
                                    <div class="plan-badge">Most Popular</div>
                                @endif
                                <div class="plan-header">
                                    <h3>{{ $value->title }}</h3>
                                    <div @if($value->free == 1) style="color: red" @endif class="price">{{ $value->free == 1 ? 'FREE' : '৳' . $value->amount }}<span
                                            class="duration">/{{ $value->timespan }}</span></div>
                                </div>
                                <ul class="features-list">
                                    @foreach ($value->infos as $info)
                                        <li><i class="{{ $info->icon }}"></i> {{ $info->title }}</li>
                                    @endforeach
                                </ul>
                                {{-- <button class="plan-cta">{{ $value->button_text }}</button> --}}
                                <a class="plan-cta" href="{{route('buypackage')}}">Buy Now</a>
                            </div>
                        @endforeach

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
                    <div class="feature-comparison">
                        <div class="comparison-item">
                            <i class="fas fa-user-shield"></i>
                            <h4>100% Verified Profiles</h4>
                            <p>Rigorous background checks on all members</p>
                        </div>
                        <div class="comparison-item">
                            <i class="fas fa-mobile-alt"></i>
                            <h4>Mobile Optimized</h4>
                            <p>Full access through our mobile app</p>
                        </div>
                        <div class="comparison-item">
                            <i class="fas fa-heartbeat"></i>
                            <h4>Smart Matching</h4>
                            <p>AI-powered compatibility scoring</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
