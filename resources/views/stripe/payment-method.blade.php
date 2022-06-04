@extends('layouts.app')
@section('content')
<div class="container">



    @if(Session::has('no-method'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <strong>{{Session::get('no-method')}}</strong>
    </div>
    @php
    Session::forget('no-method')
    @endphp
    @endif
    <div class="row">
        <div class="col-md-12">
            <br>
            <br>
            <br>
            <h5>Cardholder Name</h5>
            <input id="card-holder-name" type="text">
            <br>
            <br>
            <h5>Card Info</h5>
            <!-- Stripe Elements Placeholder -->
            <div id="card-element" style="width: 100%; border: 1 px solid #f3f3f4; outline: none; background: #f3f3f4; padding: 5 px 10 px ; border-radius: var(--border-radius); transition: 0.2s ease; padding:20px 10px;"></div>
            <br>
            <small>Your payment information is NOT stored on Gamersplay website. All your payment info is stored on Stripe servers and is properly secured - GamersPlay only gets a reference to the payment method (ID) which is then used to charge your Stripe account via Stripe API.</small>
            <br>
            <br>
            <button id="card-button" class="btn btn-primary" data-secret="{{ $intent->client_secret }}">
                Update Payment Method
            </button>

        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('pk_test_hVrwKPQLTyRidDAJxWnujNbW');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');
</script>



<script>

@if(Session::has('attempted-amount'))
   
    var attemptedAmount = {{Session::get('attempted-amount')}};
    console.log('ATTEMPTED', attemptedAmount);
{{Session::forget('attempted-amount')}}
@endif

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: { name: cardHolderName.value }
                }
            }
        );

        if (error) {
            // Display "error.message" to the user...
        } else {
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $.ajax({
                type: "POST",
                url: "/stripe/update",
                data: {paymentMethod:setupIntent.payment_method},
                success: function (response) {
                    if(attemptedAmount != undefined) {
                        window.location = '/points/stripe/pay?amount=' + parseInt(attemptedAmount);
                    } else {
                        console.log('Payment method adding succeeded.');
                    }

                }
            });
            // The card has been verified successfully...
        }
    });
</script>
@endsection