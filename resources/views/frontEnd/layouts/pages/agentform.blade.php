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
            <form action="#" method="POST" enctype="multipart/form-data">
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
                    <label>Agent Type *</label>
                    <select name="agent_type" required>
                        <option value="">Select Agent Type</option>
                        <option value="City Agent">City Agent</option>
                        <option value="Village Agent">Village Agent</option>
                    </select>
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
                    <input type="checkbox" required>
                    <label>I agree to the <a href="#">Terms & Conditions</a></label>
                </div>

                <button type="submit" class="agent_btn">Join Now</button>
            </form>
        </div>
    </div>
</section>


@endsection
