@extends('frontEnd.layouts.master')
@section('title', 'Members')

@section('content')

{{-- <section class="filter_section">
    <div class="container">
        <div class="filter-container">
            <h2 class="header-text">Most Trusted Matrimony Service For NRIs in Bangladesh</h2>
            
            <div class="filter-group">
                <div class="gender-buttons">
                    <div class="gender-btn">Women</div>
                    <div class="gender-btn">Men</div>
                </div>
        
                <div class="filter-group">
                    <div class="age-range">
                        <input type="number" class="age-input" value="22">
                        <span>to</span>
                        <input type="number" class="age-input" value="27">
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Religion</option>
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Christian</option>
                            <option>Buddhist</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Living Country</option>
                            <option>Bangladesh</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Canada</option>
                            <option>Australia</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Profession</option>
                            <option>Teacher</option>
                            <option>Doctor</option>
                            <option>House wife</option>
                            <option>Canada</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Religion</option>
                            <option>Islam</option>
                            <option>Hindu</option>
                            <option>Christian</option>
                            <option>Buddhist</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Living Country</option>
                            <option>Bangladesh</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Canada</option>
                            <option>Australia</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select class="filter-select">
                            <option>Select Profession</option>
                            <option>Teacher</option>
                            <option>Doctor</option>
                            <option>House wife</option>
                            <option>Canada</option>
                        </select>
                    </div>
                </div>
            </div>
        
            <button class="lets-begin-btn">Let's Begin</button>
        
            <div class="features">
                <div class="feature-item">
                    <h3>Best Matches</h3>
                </div>
                <div class="feature-item">
                    <h3>Verified Profiles</h3>
                </div>
                <div class="feature-item">
                    <h3>Fully Secured</h3>
                </div>
            </div>
        </div>
    </div>
</section> --}}


<section class="member_section section-padding">
    <div class="container">
        <div class="member_gird">
            @foreach ($products as $value)
                <div class="member_container">
                    <div class="member_image">
                        <img src="https://content.jdmagicbox.com/v2/comp/malappuram/k8/9999px483.x483.220721144519.g3k8/catalogue/d-fine-perintalmanna-malappuram-costumes-on-rent-glh6hj4uqz-250.jpg" alt="Member Image">
                    </div>
                    <div class="member_info">
                        <p class="member_id">ID: ofw48efwef5e484</p>
                        <h3 class="member_name">Dr. Imon Ahmed</h3>
                        <p class="member_age">Age: 36 years old</p>
                        <p class="member_qualification">Qualification: MBBS</p>
                        <div class="member_buttons">
                            <button class="btn_details">View Details</button>
                            <button class="btn_contact">Contact Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scrip')
<script>
    // Gender selection functionality
    const genderButtons = document.querySelectorAll('.gender-btn');
    genderButtons.forEach(button => {
        button.addEventListener('click', () => {
            genderButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
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
@endpush

