@extends('frontEnd.layouts.master')
@section('title', 'Join As A Agent')
@section('content')
    <section class="agent_section">
        <div class="container">
            <div class="agent_heading">
                <h2>Join as Agent</h2>
                <p>Become a trusted agent of our Matrimony Platform and start earning today.</p>
            </div>

            <div class="agent_form">
                <form action="{{ route('agent.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form_group">
                        <label>Full Name *</label>
                        <input type="text" name="name" placeholder="Enter Your Full Name" required>
                    </div>

                    <div class="form_group">
                        <label>Email Address *</label>
                        <input type="email" name="email" placeholder="Enter Your Email Address" required>
                    </div>

                    <div class="form_group">
                        <label>Phone Number *</label>
                        <input type="tel" name="phone" placeholder="Enter Your Phone Number" required>
                    </div>

                    <div class="form_group">
                        <label>Address *</label>
                        <input type="text" name="address" placeholder="Enter Your Address" required>
                    </div> 

                    <div class="form_group">
                        <label>NID / Passport Number *</label>
                        <input type="text" name="nid" placeholder="Enter Your NID/Passport Number" required>
                    </div>

                    <div class="form_group">
                        <label>Upload NID/Passport Image *</label>
                        <input type="file" name="nid_image" required>
                    </div>

                    <div class="form_group">
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="form_group">
                      <div class="">
                        <span style="color:green" class="join_agree">  <input type="checkbox" required> I agree to the <a style="color:green" href="#">Terms & Conditions</a></span>
                      </div>
                    </div>

                    <button type="submit" class="agent_btn">Join Now</button>
                </form>
            </div>
        </div>
    </section>



@endsection
