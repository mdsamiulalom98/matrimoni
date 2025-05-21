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
                  <form action="/search" method="GET">
                    <!-- Age Range -->
                   <div class="search_flex">
                    <div class="form-group">
                        <label for="ageStart">Age From:</label>
                        <input type="number" id="ageStart" name="ageStart" min="18" max="100">
                    </div>

                    <div class="form-group">
                        <label for="ageEnd">Age To:</label>
                        <input type="number" id="ageEnd" name="ageEnd" min="18" max="100">
                    </div>
                   </div>
                    <!-- Education -->
                    <label for="education">Education:</label>
                    <input type="text" id="education" name="education">
                
                    <!-- Profession -->
                    <label for="profession">Profession:</label>
                    <input type="text" id="profession" name="profession">
                
                    <!-- Division -->
                    <label for="division">Division:</label>
                    <input type="text" id="division" name="division">
                
                    <!-- District -->
                    <label for="district">District:</label>
                    <input type="text" id="district" name="district">
                
                    <!-- Upazila -->
                    <label for="upazila">Upazila:</label>
                    <input type="text" id="upazila" name="upazila">
                
                    <!-- Religion -->
                    <label for="religion">Religion:</label>
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
