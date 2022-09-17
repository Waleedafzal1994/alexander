@extends('layouts.app')
@section('style')
<style>


    form input, form select, form textarea {
        margin:15px 0;
    }
    thead th {
        word-wrap: nowrap;
        white-space: nowrap;
    }
</style> 
@endsection

@section('content')
<div class="header-page rounded">
    <div>
        <h1>Withdrawals</h1>
        <p>Here you may submit a withdrawal request for your earnings or see history of your previous withdrawal requests.</p>
        <p>Thank you for being a GamersPlay seller. </p>
    </div>
</div>
<div class="container-fluid">
    <p>You currently have <strong style="font-size:16px;">${{Auth::user()->earned_gp}}</strong> available to withdraw.</p>
    <p>Would you like to make a withdrawal?</p>
    <br>
    <form action="/seller/withdrawals/new" method="POST">
    @csrf
    <label for="">Withdrawal amount</label>
    <input type="number" step="0.01" min="0.01" max="{{Auth::user()->earned_gp}}" name="amount" class="input form-control" required>
    <select name="payment_method" id="payment_method" class="form_control" required>
        <option value="">Select</option>
        <option value="0">PayPal</option>
        <option value="1">Bank transfer</option>
    </select>
    <input type="email" name="paypal_email" class="input paymentInput" placeholder="PayPal Email" style="display:none;">
    <input type="text" name="bank_iban" class="input paymentInput" placeholder="International Bank Account Number (IBAN)" style="display:none;">
    <input type="text" name="bank_name" class="input paymentInput" placeholder="Bank Name" style="display:none;">
    <input type="text" name="bank_swift" class="input paymentInput" placeholder="Bank SWIFT" style="display:none;">
    <input type="text" name="name" class="input paymentInput" placeholder="Recipient Name" style="display:none;">
    <input type="text" name="address" class="input paymentInput" placeholder="Recipient Address" style="display:none;">
    <textarea name="note" id="" cols="3" rows="3" class="input" placeholder="Additional note (optional)"></textarea>
    <button class="btn btn-primary" id="submitBtn">Submit</button>
    </form>
    @if(count($withdrawals) > 0)
    <br>
    <br>
    <hr>
    <h4>My Withdrawals</h4>
    <p>Below you will find history of your withdrawals.</p>
    <br>
    <div class="table-responsive">
        <table class="table" style="width:100%;">
            <thead>
                <tr>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    {{-- <th>PayPal Email</th>
                    <th>Bank Name</th>
                    <th>Bank SWIFT</th>
                    <th>IBAN</th>
                    <th>Recipient Name</th>
                    <th>Recipient Address</th> --}}
                    <th>Note</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($withdrawals as $withdrawal)
                <tr>
                    <td>
                    @php
                        if($withdrawal->payment_method == '0') {
                            echo "PayPal";
                        } else if ($withdrawal->payment_method == '1') {
                            echo "Bank Transfer";
                        }
                    @endphp
                    </td>
                    <td>${{$withdrawal->amount}}</td>
                    {{-- <td>{{$withdrawal->paypal_email ?? ''}}</td>
                    <td>{{$withdrawal->bank_name ?? ''}}</td>
                    <td>{{$withdrawal->bank_swift ?? ''}}</td>
                    <td>{{$withdrawal->bank_iban ?? ''}}</td>
                    <td>{{$withdrawal->bank_recipient ?? ''}}</td>
                    <td>{{$withdrawal->bank_recipient_address ?? ''}}</td> --}}
                    <td>{{$withdrawal->note ?? ''}}</td>
                    <td>{{$withdrawal->created_at ?? ''}}</td>
                    <td>
                        @php
                            switch($withdrawal->status) {
                                case '0':
                                    echo "Pending";
                                break;
                                case '1':
                                    echo "Denied";
                                break;
                                case '2':
                                    echo "Approved";
                                break;
                                case '3':
                                    echo "Cancelled";
                                break;

                                default:
                                break;
                            }
                        @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$withdrawals->links()}}
    @endif
</div>
@endsection

@push('scripts')
    <script>
        $('#payment_method').change(function (e) { 
            e.preventDefault();
            switch (this.value) {
                case '0':
                    $('.paymentInput').hide();
                    $('input[name="paypal_email"]').show();
                break;

                case '1':
                    $('.paymentInput').hide();
                    $('input[name="bank_iban"]').show();
                    $('input[name="bank_name"]').show();
                    $('input[name="bank_swift"]').show();
                    $('input[name="name"]').show();
                    $('input[name="address"]').show();
                break;
            
                default:
                    $('input[name="paypal_email"]').hide();
                break;
            }
        });


        function errorNotice(element,message) {
            if($(element).val().length == 0) {
                Swal.fire('Notice',message,'error');
                return true;
            }
            return false;
        }

        $('#submitBtn').click(function (e) { 

            var paymentMethod = $('#payment_method').val();
            switch (paymentMethod) {
                case '0':
                    if($('input[name="paypal_email"]').val().length == 0) {
                        var hasError = errorNotice('input[name="paypal_email"]','Please fill the payment address field.');
                        if(hasError) {
                            e.preventDefault();
                            return false;
                        }
             
                    }
                    break;
                case '1':
                    var hasError = errorNotice('input[name="bank_name"]','Please fill the bank name field.');
                    if(hasError) {
                        e.preventDefault();
                        return false;
                    }
                    var hasError = errorNotice('input[name="name"]','Please fill the recipient name field.');
                    if(hasError) {
                        e.preventDefault();
                        return false;
                    }
                    var hasError = errorNotice('input[name="address"]','Please fill the recipient address field.');
                    if(hasError) {
                        e.preventDefault();
                        return false;
                    }
                    break;
            
                default:
                    break;
            }
        });
        @if (\Session::has('success'))
        Swal.fire('Success','{{\Session::get('success')}}','success');
        {{\Session::forget('success')}}
        @endif
    </script>
@endpush