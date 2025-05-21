@extends('frontEnd.layouts.master')
@section('title', $details->name)
@push('seo')
   
@endpush

@section('content')
    

    <section class="member_biodata_section section-padding">
        <div class="container">
                <div class="biodata_container">
                    <div class="biodata-card">
                        <h2>Biodata No: ODF-20225</h2>
                    
                        <div class="biodata-info">
                            <div><span>বায়োডাটার ধরন</span> <span>পাত্রীর বায়োডাটা</span></div>
                            <div><span>বৈবাহিক অবস্থা</span> <span>অবিবাহিত</span></div>
                            <div><span>জন্মসন</span> <span>November, 2000</span></div>
                            <div><span>উচ্চতা</span> <span>৫' ২"</span></div>
                            <div><span>গাত্রবর্ণ</span> <span>ফর্সা</span></div>
                            <div><span>ওজন</span> <span>৭০ কেজি</span></div>
                            <div><span>রক্তের গ্রুপ</span> <span>B+</span></div>
                            <div><span>জাতীয়তা</span> <span>বাংলাদেশী</span></div>
                        </div>
                    
                        <div class="action-buttons">
                            <button class="btn btn-shortlist">⭐ SHORTLIST</button>
                            <button class="btn btn-ignore">🚫 IGNORE</button>
                        </div>
                    
                        <button class="btn btn-copy">📋 Copy Biodata Link</button>
                    </div>
                    
                </div>
        </div>
    </section>

    

    @endsection 

    @push('script')
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/zoomsl.min.js') }}"></script>


</script> 

@endpush
