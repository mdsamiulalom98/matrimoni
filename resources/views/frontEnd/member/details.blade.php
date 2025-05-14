@extends('frontEnd.layouts.master')
@section('title', 'Member Details')
@section('content')

    <section class="member_details mt-3">
        <div class="container">
            <!-- Profile Header -->
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">

                    <div class="details_profile_header">
                        <div class="details-profile-photo">
                            <img src="https://img.freepik.com/free-photo/close-up-portrait-indian-hindu-girl-traditional-violet-saree-posed-street_627829-12971.jpg?semt=ais_hybrid&w=740" alt="Profile Photo">
                        </div>
                        <div class="d_profile_info">
                            <h4 class="name">Sumaiya Khatun, 28</h4>
                            <p class="tagline">Looking for a like-minded partner</p>
                            <ul class="quick-stats">
                                <li><i class="fas fa-praying-hands icon"></i>Islam</li>
                                <li><i class="fas fa-heart icon"></i>Never Married</li>
                                <li><i class="fas fa-map-marker-alt icon"></i>Dhaka, Bangladesh</li>
                            </ul>
                            <div class="d_request_btn">
                                <a href="#">Request Contact</a>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Personal Information -->
                    <div class="info_card">
                        <h2 class="info-head"><i class="fas fa-user icon"></i>Personal Information</h2>
                        <div class="grid-2">
                            <div>
                                <p><span>Date of Birth:</span> 15th March 1995</p>
                                <p><span>Height:</span> 5'4"</p>
                                <p><span>Blood Group:</span> O+ </p>
                                <p><span>Diet:</span> Vegetarian</p>
                            </div>
                            <div>
                                <p><span>Weight:</span> 54 Kg </p>
                                <p><span>Languages:</span> Hindi, English, Marathi</p>
                                <p><span>Hobbies:</span> Reading, Traveling, Yoga</p>
                            </div>
                        </div>
                        <p><span>About Me:</span> I'm a positive, career-oriented individual who values family
                            traditions while embracing modern values.</p>
                    </div>

                    <!-- Family Details -->
                    <div class="info_card">
                        <h2 class="info-head"><i class="fas fa-home icon"></i>Family Details</h2>
                        <div class="grid-2">
                            <div>
                                <p><span>Father Name:</span> Md Siddik</p>
                                <p><span>Father Profession:</span> Corporate Job</p>
                                <p><span>Mother Name:</span> Mst Babali</p>
                                <p><span>Mother Profession:</span> House Wife</p>
                            </div>
                            <div>
                                <p><span>Brother:</span> 1 Brother </p>
                                <p><span>Married Brother:</span> 1 Brother </p>
                                <p><span>Sister:</span> 3 Sister</p>
                                <p><span>Married Sister:</span> 1 Sister</p>
                                <p><span>Family Type:</span> Joint Family</p>
                            </div>
                        </div>
                    </div>

                    <!-- Education & Career -->
                    <div class="info_card">
                        <h2 class="info-head"><i class="fas fa-graduation-cap icon"></i>Education Qualification</h2>

                        <div class="grid-2">
                            <div>
                                <p><span>SSC Passing Year:</span> 2025</p>
                                <p><span>GPA (SSC):</span> A+</p>
                                <p><span>Latest Education:</span> Diploma</p>
                                <p><span>Highest Education:</span> BSC in CSE</p>
                                <p><span>Education medium:</span> 1 Seience </p>
                            </div>
                            <div>
                                <p><span>Education End Year:</span> 2025</p>
                                <p><span>GPA (Latest):</span> A+</p>
                                <p><span>Education End Medium:</span> 1 Seience </p>
                                <p><span>Education End Year:</span> 2025</p>
                                <p><span>GPA (Latest):</span> A+</p>
                            </div>
                        </div>
                    </div>
                    <div class="info_card">
                        <h2 class="info-head"><i class="fas fa-home icon"></i>Profession</h2>
                        <div class="grid-2">
                            <div>
                                <p><span>Profession:</span> Govt Job</p>
                                <p><span>Monthly Income:</span> 35 k</p>
                            </div>

                        </div>
                    </div>
                    <div class="info_card">
                        <h2 class="info-head"><i class="fas fa-heart icon"></i>Partner Preferences</h2>
                        <ul>
                            <li><span>Age:</span> 28–32 years</li>
                            <li><span>Religion:</span> Islam</li>
                            <li><span>Height:</span> 5'8" and above</li>
                            <li><span>Education:</span> Hsc Pass</li>
                            <li><span>Location:</span> Mumbai/Pune/Delhi</li>
                            <li><span>Profession:</span> Any kind of job</li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3"></div>
            </div>
    </section>

@endsection
@push('script')
@endpush
