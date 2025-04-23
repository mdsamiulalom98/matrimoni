@extends('frontEnd.layouts.master')
@section('title', 'Members')

@section('content')

  

    

    <section class="member-profile-section">
        <div class="container">
            @php
                $member = Auth::guard('member')->check() ? Auth::guard('member')->user() : null;
            @endphp

            

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-3" id="my-match" role="tabpanel" aria-labelledby="my-match-tab">

                    <div class="find_member d-none">
                        <div class="filtercontainer">
                            
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade mt-3" id="view-profile" role="tabpanel" aria-labelledby="view-profile-tab">
                    
                   <h1>Who Visited My Profile</h1>
                </div>

                <div class="tab-pane fade mt-3" id="view-not-contact" role="tabpanel"
                    aria-labelledby="view-not-contact-tab">
                    <p>There needs to be something here.</p>
                </div>
            </div>
        </div>
    </section>



    <section class="member_section">
        <div class="custome_container">
            <div class="member_gird">
                @foreach ($members as $key => $value)
                    <div class="post-container">
                        <div class="post-header-flex">
                            <div class="post-header">
                                {{-- <i class="fa-solid fa-user profile-pic"></i> --}}
                                <img class="profile-pic" src="{{ asset($value->memberimage->image_one ?? '') }}"
                                    alt="">
                                <div>
                                    <div class="member_info_flex">
                                        <h3 class="member_name">{{ $value->name }}</h3>
                                        <i class="fa-solid fa-circle-check"></i>
                                        <p class="veri_text">Verified</p>
                                    </div>
                                    <div class="post-time">
                                        <p class="member_id">ID: {{ $value->member_id }}</p>
                                        <p>90 views</p>
                                        <p>9 days ago </p>
                                    </div>
                                </div>
                            </div>
                            <div class="three_dot">
                                <i class="fa-solid fa-ellipsis-h "></i>
                            </div>
                        </div>

                        @if ($value->profile_lock == 1)
                            <div class="member_image d-flex justify-content-center align-items-center">
                                <i class="fa fa-user"></i>
                            </div>
                        @else
                            <div class="member_image">
                                <a href="{{ route('details', $value->id) }}">
                                    <img src="{{ asset($value->memberimage->image_one ?? '') }}" alt="Member Image">
                                </a>
                                <div class="post-caption">
                                    {{-- <p class="member_id">ID: {{ $value->member_id }}</p> --}}
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Age :
                                            <p style="color: red">{{ $value->memberinfo->age ?? '' }}</p>
                                        </span>
                                        <span class="member_age">
                                            Height :
                                            <p style="color: red">5 feet 3 inch</p>
                                        </span>
                                        <span class="member_age">
                                            Profession :
                                            <p style="color: red"> {{ $value->membercareer->profession->title ?? '' }}</p>
                                        </span>

                                    </div>
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Riligion :
                                            <p style="color: red">Islam</p>
                                        </span>
                                        <span class="member_age">
                                            Education :
                                            <p style="color: red">Diploma</p>
                                        </span>
                                        <span class="member_age">
                                            Living :
                                            <p style="color: red">Dhaka</p>
                                        </span>

                                    </div>
                                    <div class="member_post_flex">
                                        <span class="member_age">
                                            Monthly Income :
                                            <p style="color: red">35 k</p>
                                        </span>
                                        <span class="member_age">
                                            Home District :
                                            <p style="color: red">Dhaka</p>
                                        </span>
                                        <span class="member_age">
                                            complexion :
                                            <p style="color: red">fair</p>
                                        </span>

                                    </div>
                                    <div class="discount_box">
                                        <p>75% Off Package</p>
                                        <span class="dflex_p">
                                            <p class="discount_pkg">Buy Now</p>
                                            <a class="boost_btn" href="#">Boost Now</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="post-footer">
                            <a href="#" onclick="document.getElementById('proposalForm{{ $key }}').submit(); return false;">
                                <span>
                                    <i class="fa-solid fa-hand-holding-hand"></i>
                                    <p>Proposel</p>
                                </span>
                            </a>
                            <form id="proposalForm{{ $key }}" method="POST"
                                action="{{ route('member.proposal.send', ['receiver_id' => $value->id]) }}">
                                @csrf
                            </form>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-message"></i>
                                    <p>Message</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-message"></i>
                                    <p>Message</p>
                                </span>
                            </a>
                            @php
                                $requestStatus = '';
                                if (Auth::guard('member')->check()) {
                                    $sender_id = Auth::guard('member')->user()->id;
                                    $receiver_id = $value->id;
                                    $findRequest = \App\Models\ProposalRequest::where(function ($query) use (
                                        $sender_id,
                                        $receiver_id,
                                    ) {
                                        $query->where('sender_id', $sender_id)->where('receiver_id', $receiver_id);
                                    })->first();
                                    $requestStatus = $findRequest->status ?? '';
                                }
                            @endphp
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-phone-volume"></i>
                                    @if ($requestStatus == 'accepted')
                                        <p>{{ $value->phone }}</p>
                                    @else
                                        <p>Contact {{ $requestStatus }}</p>
                                    @endif
                                </span>
                            </a>
                            <a href="#" onclick="document.getElementById('favoriteForm{{ $key }}').submit(); return false;">
                                <span>
                                    <i style="color: red" class="fa-solid fa-heart"></i>
                                </span>
                            </a>
                            <form id="favoriteForm{{ $key }}" method="POST"
                                action="{{ route('member.favorite.send', ['favorite_id' => $value->id]) }}">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    
  

@endsection

@push('script')
    <script>
        document.querySelectorAll(".toggle-group").forEach(group => {
            group.addEventListener("click", function(event) {
                let btn = event.target;
                if (!btn.classList.contains("toggle-btn")) return;

                // Remove active class from all buttons in this group
                group.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));

                // Add active class to clicked button
                btn.classList.add("active");

                // Find the associated hidden input and update its value
                let inputField = group.nextElementSibling;
                if (inputField) {
                    inputField.value = btn.getAttribute("data-value");
                }
            });
        });
    </script>
    
@endpush
