@extends('frontEnd.layouts.master')
@section('title', 'Members')
@section('content')


    <section class="member_section section-padding">
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
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-hand-holding-hand"></i>
                                    <p>Proposel</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-message"></i>
                                    <p>Message</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <p>Contact</p>
                                </span>
                            </a>
                            <a href="#">
                                <span>
                                    <i style="color: red" class="fa-solid fa-heart"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('script')
    <script>
        // Gender selection functionality
        const genderButtons = document.querySelectorAll('.gender-btn');
        genderButtons.forEach(button => {
            button.addEventListener('click', () => {
                genderButtons.forEach(btn => btn.classList.remove('active'));
                const displayElement = document.getElementById('selectedGender');
                button.classList.add('active');
                // Get the selected value from data attribute
                const selectedValue = button.dataset.gender;

                // Update hidden input value (for form submission)
                displayElement.value = selectedValue;
            });
        });

        // Form submission
        document.querySelector('.lets-begin-btn').addEventListener('click', () => {
            const gender = document.querySelector('.gender-btn.active').textContent;
            const minAge = document.querySelector('.age-input:first-child').value;
            const maxAge = document.querySelector('.age-input:last-child').value;
            const religion = document.querySelectorAll('select')[0].value;
            const country = document.querySelectorAll('select')[1].value;

            alert(`Searching for:
        Gender: ${gender}
        Age: ${minAge} to ${maxAge}
        Religion: ${religion}
        Country: ${country}`);
        });
    </script>
    <script>
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $(previewId).attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_one").change(function() {
            previewImage(this, "#preview_one");
        });
        $("#image_two").change(function() {
            previewImage(this, "#preview_two");
        });
        $("#image_three").change(function() {
            previewImage(this, "#preview_three");
        });
    </script>

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
