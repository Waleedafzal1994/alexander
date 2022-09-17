@extends('layouts.admin')

@section('content')
<style>
    td {
        vertical-align:middle !important;
        text-align: center;
    }
</style>
<div class="container-fluid admin-container">
    <h6>Admin Panel - Withdrawal Requests </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>

    <br>
    <br>
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th>User</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Payment Details</th>
                        <th>Note</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="withdrawals_list">
                    @if(count($withdrawals) == 0)
                    <tr>
                        <td colspan="7" style="text-align:center !important;">No data found.</td>
                    </tr>
                    @endif
                    @foreach($withdrawals as $withdrawal)
                    <tr id="withdrawal_{{$withdrawal->id}}">
                        <td scope="row">{{$withdrawal->user->name}}</td>
                        <td>{{$withdrawal->amount}}</td>
                        <td>
                            @php
                                if($withdrawal->payment_method == 0) {
                                    echo 'PayPal';
                                } else echo "Bank Transfer";
                            @endphp
                        </td>
                        <td>
                            @php
                            if($withdrawal->payment_method == 0) {
                                echo "PayPal email: ".$withdrawal->paypal_email;
                            } else {
                                echo "IBAN: ".$withdrawal->bank_iban."<br>";
                                echo "Bank Name: ".$withdrawal->bank_name."<br>";
                                echo "Bank SWIFT: ".$withdrawal->bank_swift."<br>";
                                echo "Recipient: ".$withdrawal->bank_recipient."<br>";
                                echo "Address: ".$withdrawal->bank_recipient_address."<br>";
                            }
                        @endphp


                        </td>
                        <td>{{$withdrawal->note}}</td>
                        <td>
                            {{$withdrawal->created_at}} <small>({{$withdrawal->created_at->diffForHumans()}})</small>
                        </td>
                        <td>
                            <a href="#" class="btn btn-success btn-admin-action" data-decision='approve' data-id="{{$withdrawal->id}}">Approve</a>
                            <a href="#" class="btn btn-danger btn-admin-action" data-decision='deny' data-id="{{$withdrawal->id}}">Deny</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{$withdrawals->links()}}
        </div>
    </div>

</div>    
@endsection

@push('scripts')
    <script>





        $('.btn-admin-action').click(function (e) { 
            e.preventDefault();
            var decision = this.dataset.decision;
            var id = this.dataset.id;

            $.ajax({
                type: "GET",
                url: "/admin/withdrawals/approve",
                data: {decision:decision, id:id},
                success: function (response) {
                    if(response == 'success') {
                        var icon, text;
                        if(decision == 'approve') {
                            icon = 'success';
                            text = 'approved';
                        } else {
                            icon = 'error';
                            text = 'denied';
                        }
                        Swal.fire({
                        title: 'Withdrawal has been ' + text,
                        html: '',
                        timer: 500,
                        icon: icon,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                        });
                        $('#withdrawal_' + id).remove();
                    }
                    // if($('#withdrawals_list > li'))
                }
            });
        });
    </script>
@endpush