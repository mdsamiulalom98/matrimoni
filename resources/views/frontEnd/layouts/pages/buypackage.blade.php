@extends('frontEnd.layouts.master')
@section('title','Buy Package')
@section('content')

<section class="buy_package_section">
  <div class="container">
    <div class="row justify-content-center">
    
      <div class="col-md-6">
        <div class="package-card">
          <h4 class="text-center mb-4">Select Payment Method</h4>
          <div class="coupon_apply">
            <form action="" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                <button class="btn btn-primary" type="submit">Apply</button>
            </div>
            </form>
          </div>
          <form action="#" method="POST">
            @csrf

            <div class="gateway-list">
              <label class="gateway-option">
                <input type="radio" name="gateway" value="bkash">
                <img src="https://www.alpha.net.bd/Content/img/ecommerce/bkashlogo.svg" alt="bKash">
              </label>
              <label class="gateway-option">
                <input type="radio" name="gateway" value="rocket">
                <img src="https://kodular-community.s3.dualstack.eu-west-1.amazonaws.com/original/3X/2/4/243466e3bbd3c86695a8283581144c8944b9d715.png" alt="Rocket">
              </label>
              <label class="gateway-option">
                <input type="radio" name="gateway" value="nagad">
                <img src="https://ubankconnect.com/wp-content/uploads/2024/07/Nagad.png" alt="Nagad">
              </label>
            </div>
           <div class="summary-box">
            <h5>Payment Summary</h5>
            <div class="row">
              <div class="col-6">Package Name:</div>
              <div class="col-6 text-right">Premium Membership</div>
            </div>
            <div class="row">
              <div class="col-6">Price:</div>
              <div class="col-6 text-right">৳1000</div>
            </div>
            <div class="row">
              <div class="col-6">Coupon Discount:</div>
              <div class="col-6 text-right">-৳200</div>
            </div>
            <hr>
            <div class="row font-weight-bold">
              <div class="col-6">Total Payable:</div>
              <div class="col-6 text-right">৳800</div>
            </div>
          </div>
            <button type="submit" class="submit-btn" id="payBtn" disabled>Proceed to Pay</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('script')
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>

<script>
  const gateways = document.querySelectorAll('.gateway-option');
  const payBtn = document.getElementById('payBtn');

  gateways.forEach(option => {
    option.addEventListener('click', () => {
      // Clear active states
      gateways.forEach(g => g.classList.remove('active'));
      option.classList.add('active');

      // Check the input
      const input = option.querySelector('input[type="radio"]');
      input.checked = true;

      // Enable the submit button
      payBtn.disabled = false;
    });
  });
</script>

@endpush