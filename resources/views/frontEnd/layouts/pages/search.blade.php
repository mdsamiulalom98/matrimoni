@extends('frontEnd.layouts.master')
@section('title', 'Packages')
@section('content')


    <section class="search_section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="member_search_box">
                        <h2>Member Search</h2>
                        <form action="{{ route('members') }}" method="GET">
                            <!-- Age Range -->
                            {{-- <div class="search_flex">
                                <div class="form-group">
                                    <label for="ageStart">Age From:</label>
                                    <input type="number" id="ageStart" name="ageStart" min="18" max="100">
                                </div>

                                <div class="form-group">
                                    <label for="ageEnd">Age To:</label>
                                    <input type="number" id="ageEnd" name="ageEnd" min="18" max="100">
                                </div>
                            </div> --}}


                            <div class="search_flex">
                                <div class="form-group">
                                    <label>Age Start <span class="bn_lable">(বয়স শুরু)</span></label>
                                    <select name="ssc_passing">
                                        <option value="">Year</option>
                                        @php
                                            $startAge = 60;
                                            $endAge = 18;
                                        @endphp

                                        @for ($i = $startAge; $i >= $endAge; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Age End <span class="bn_lable">(বয়স শেষ)</span></label>
                                    <select name="ssc_passing">
                                        <option value="">Year</option>
                                        @php
                                            $startAge = 60;
                                            $endAge = 18;
                                        @endphp

                                        @for ($i = $startAge; $i >= $endAge; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <!-- Education -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Education <span class="bn_lable">(শিক্ষা)</span></label>
                                    <select name="education" required>
                                        <option value="any">Any</option>
                                        @foreach ($educations as $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Profession -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Profession <span class="bn_lable">(পেশা)</span></label>
                                    <select name="profession" required>
                                        <option value="any">Any</option>
                                        @foreach ($professions as $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Division -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Division <span class="bn_lable">(বিভাগ)</span></label>
                                    <select name="division" required>
                                        <option value="any">Any</option>
                                        @foreach ($divisions as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- District -->

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>District <span class="bn_lable">(জেলা)</span> *</label>
                                    <select name="district" required>
                                        <option value="any">Any</option>
                                        @foreach ($countries as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Upazila -->


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>District <span class="bn_lable">(উপজেলা)</span> *</label>
                                    <select name="upazila" required>
                                        <option value="any">Any</option>
                                        @foreach ($upazilas as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Religion -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Religion <span class="bn_lable">(ধর্ম)</span> *</label>
                                    <select name="religion" required>
                                        <option value="any">Any</option>
                                        @foreach ($religions as $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="text" id="religion" name="religion">

                            <!-- Nationality -->
                            <label for="nationality">Nationality:</label>
                            <input type="text" id="nationality" name="nationality">

                            <!-- Submit Button -->
                            <button class="submit-btn mt-4">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>

@endsection
