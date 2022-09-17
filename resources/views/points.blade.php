@extends('layouts.app')


@section('content')
<style>
    input[type="radio"],label {
        cursor: pointer;
    }
</style>
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background:var(--color-background); color:white;">
          <h5 class="modal-title" id="exampleModalLabel">Purchase</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
        <p>You are attempting to purchase <span id="gp_amount" style="font-weight:bold;">10</span> GP.</p>
        <hr>
        <br>
        <h6> Which payment method would you like to use?</h6>
        <br>
        <input type="radio" name="payment_method" id="payment_method1" style="width:30px;" value="1" checked> <label for="payment_method1"><img src="/imgs/icons/paypal.svg" style="height:70px;"></label>
        <br>
        <input type="radio" name="payment_method" id="payment_method2" style="width:30px;" value="2"> <label for="payment_method2"><img src="/imgs/icons/stripe.svg" style="height:70px;"></label>
        
    
        <hr>
        <table style="width:100%;">
            <tr>
                <td>GP Price</td>
                <td style="text-align:right;">$ <span id="gp_price">0.00</span></td>
            </tr>
            <tr>
                <td>Tax (15%)</td>
                <td style="text-align:right;">$ <span id="tax">0.00</span></td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td style="text-align:right;">$ <span id="total">0.00</span></td>
            </tr>
        </table>
     

        </div>
        <div class="modal-footer">
            <a href="#" id="purchaseBtn" class="btn btn-primary">Purchase ($ <span id="totalBtn">0.00</span>)</a>
        </div>
      </div>
    </div>
  </div>




<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>Order completed.</strong>
    </div>
    @php
    Session::forget('success')
    @endphp
    @endif

    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>Order failed.</strong>
    </div>
    @php
    Session::forget('error')
    @endphp
    @endif

    <div class="row">
        <div class="col-md-8">
            <div style="height:100%; display:flex; align-items:center; justify-content:center;">
                <div>
                    <h5>Your current points balance is: </h5>
                    <p style="font-size:2em; font-weight:bold; text-align:center; color:var(--color-secondary);">{{Auth::user()->points}} GP</p>

                </div>
          

            </div>
            
        </div>
        <div class="col-md-4">
            <img src="{{asset('imgs/bg.svg')}}" alt="" style="max-width:100%;">
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="purchase-box" data-amount="10">
                <h2>$10</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="20">
                <h2>$20</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="30">
                <h2>$30</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="50">
                <h2>$50</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="70">
                <h2>$70</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="100">
                <h2>$100</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="200">
                <h2>$200</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="400">
                <h2>$400</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="purchase-box" data-amount="1000">
                <h2>$1000</h2>
            </div>
        </div>
    </div>

</div>




@endsection

@push('scripts')

<script>


$('.purchase-box').on('click', function () {
    $('#paymentModal').modal('show');
    var amount = Number(this.dataset.amount);
    var tax = amount * 0.15;
    var total = amount + tax;
    tax = tax.toFixed(2);
    $('#gp_amount').text(amount);
    $('#gp_price').text(amount.toFixed(2));
    $('#tax').text(tax);
    $('#total').text(total.toFixed(2));
    $('#totalBtn').text(total.toFixed(2));
});




$('#purchaseBtn').click(function (e) { 
    e.preventDefault();
    var paymentMethod = $('input[name="payment_method"]:checked').val();
    if(paymentMethod === '1') {
        window.location = '/points/paypal/pay?amount=' + parseInt($('#gp_amount').text());
    } else if(paymentMethod === '2') {
        window.location = '/points/stripe/pay?amount=' + parseInt($('#gp_amount').text());
    } else {
        alert('Please select a payment method.');
    }
});





</script>

@endpush