@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@endsection
@section('content')

@if($order->status == '1' || $order->status == '3' || $order->status == '4')
<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin-top:120px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Feedback</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
          <p>Please rate the seller's provided service:</p>
          <hr>
          <div style="text-align:center;">
            <img src="/imgs/icons/star-full.svg" class="feedback-star" data-stars="1">
            <img src="/imgs/icons/star-empty.svg" class="feedback-star" data-stars="2">
            <img src="/imgs/icons/star-empty.svg" class="feedback-star" data-stars="3">
            <img src="/imgs/icons/star-empty.svg" class="feedback-star" data-stars="4">
            <img src="/imgs/icons/star-empty.svg" class="feedback-star" data-stars="5">
          </div>
          <br>
          <p>Your feedback</p>
          <textarea name="" id="feedback" cols="1" rows="3" class="form-control"></textarea>
          <br>
          <p>Anonymous review? <input type="checkbox" name="" id="anonymous" style="display:inline;width:15px; vertical-align:middle;"></p>
          <small>If you tick this option, only the first letter of your nickname will be shown.</small>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="submitFeedbackBtn">Submit</button>
      </div>
    </div>
  </div>
</div>
@endif


<div class="header-page">
  <div>
    <h1>Order #{{$order->id}}</h1>
  </div>
</div>

@if($dispute != null)
<div class="alert alert-danger" role="alert">
  <strong>This order has been disputed.</strong>
  <br>
  <a href="/dispute/{{$dispute->id}}" class="btn btn-primary">View dispute</a>

</div>
@endif

<div class="container-fluid" style="margin-top:10px;">
  <div style="display:flex; justify-content:center; align-items:center;">
    <div id="status" style="display:flex; align-items:center; margin-right:45px;">
      <p ><strong>Status:</strong>
  
      @if($order->status == '0')
          <div style="display:flex; align-items:center;">
            <img src="{{asset('imgs/icons/time.svg')}}" alt="Icon" class="gamersplay-icon">
            <p>Order created, escrow auto release in: <span id="hours"></span> hours, <span id="minutes"></span> minutes.</p>
          </div>


      @elseif($order->status == '1')
      <div style="display:flex; align-items:center;">
        <img src="{{asset('imgs/icons/check.svg')}}" alt="Icon" class="gamersplay-icon">
        <p>Order complete</p>
      </div>
      @elseif($order->status == '2')
      <div style="display:flex; align-items:center;">
        <img src="{{asset('imgs/icons/warranty.svg')}}" alt="Icon" class="gamersplay-icon">
        <p>Disputed</p>
      </div>
      @elseif($order->status == '3')
      <div style="display:flex; align-items:center;">
        <img src="{{asset('imgs/icons/chargeback.svg')}}" alt="Icon" class="gamersplay-icon">
        <p>Buyer Refunded</p>
      </div>
      @elseif($order->status == '4')
      <div style="display:flex; align-items:center;">
        <img src="{{asset('imgs/icons/check_alt.svg')}}" alt="Icon" class="gamersplay-icon">
        <p>Order complete</p>
      </div>
      @elseif($order->status == '5')
      <div style="display:flex; align-items:center;">
        <img src="{{asset('imgs/icons/chargeback.svg')}}" alt="Icon" class="gamersplay-icon">
        <p>Order cancelled by seller</p>
      </div>
      @endif
      </p>
            
    </div>
      <p><strong>Date:</strong> {{$order->created_at->format('d M, Y')}}</p>
  </div>
  <hr>
    <div class="row">
        <div class="col-md-6" style="background:rgba(0,0,0,0.015); padding:5px 25px; border-radius:6px;">
            <div id="accordianId" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="section1HeaderId">
                        <h5 class="mb-0">
                            <a data-toggle="#" href="#orderSummaryId" aria-expanded="true" aria-controls="orderSummaryId">
                      Order Summary
                    </a>
                        </h5>
                    </div>
                    <div id="orderSummaryId" class="" role="tabpanel" aria-labelledby="section1HeaderId">
                        <div class="card-body">
                            {{-- {{dd($order->service->images)}} --}}
                            <div style="display:flex; justify-content:space-between; align-items:center;">

                            <div>
                              @if(is_array($order->service->images) && count($order->service->images) > 0)
                              @else
                              <img src="{{asset('/imgs/services/astronaut.png')}}" alt="Image" style="height:64px; width:64px; image-position:center; object-fit:cover; border-radius:8px;">
                              @endif
                                
                            </div>

                            <div>
                                <p><strong><a href="/service/{{$order->service->id}}">{{$order->service->name}}</a></strong></p>
                            </div>
                                
                            <div>
                                <p>{{$order->price}} GP</p>
                            </div>
                            </div>
                            @if($order->service->instructions)
                            <br>
                            <p>Seller has left the following instructions:</p>
                            <textarea name="instructions" id="" cols="1" rows="3" disabled>{{$order->service->instructions}}</textarea>
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                @if($order->status == '0')
                <div class="card">
                  <div class="card-header" role="tab" id="section1HeaderId">
                      <h5 class="mb-0">
                          <a data-toggle="#" href="#" aria-expanded="true" aria-controls="orderSummaryId">
                    Actions
                  </a>
                      </h5>
                  </div>
                  <div id="orderSummaryId" class="" role="tabpanel" aria-labelledby="section1HeaderId">
                      <div class="card-body">
                        @if($order->status == 0  && Auth::id() == $order->seller_id)
                        <form action="/order/{{$order->id}}/cancel" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-block" onClick="return confirmCancel()">Cancel Order</button>
                        </form>
                        @endif
                        @if($order->status == 0)
                        <form action="/order/{{$order->id}}/dispute" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block" onClick="return confirmDispute()">Dispute</button>
                        </form>
                        @endif
                        @if($order->status == 0 && Auth::id() == $order->buyer_id)
                        <form action="/order/{{$order->id}}/releasePayment" method="POST" style="margin-top:5px;">
                          @csrf
                          <button type="submit" class="btn btn-primary btn-block" onClick='return confirmSubmit()'>Complete Order</button>
                        </form>
                        @endif
                      </div>
                  </div>
              </div>
              @endif
         
            </div>
        </div>
        <div class="col-md-6">

    {{-- Current active window --}}
    <div style="background:white; border-radius:2px; border:1px solid rgba(0,0,0,0.2);min-height:400px; width:95%;">

        {{-- User Info --}}
        <div style="display:flex; justify-content:space-between; background:rgba(0,0,0,0.03); border-radius:0px; width:100%; padding:10px; height:60px;">
          <div style="margin-right:10px;">
            <img src="{{asset('/imgs/avatar.svg')}}" alt="Photo" style="height:40px; object-fit:cover; width:40px; border:2px solid transparent;">
          </div>
          <div style="width:100%; padding:5px 0;">
          <h6>Chat <span style="float:right;" class="material-icons">more_horiz</span></h6>
          </div>
        </div>
        <hr style="margin:0; padding:0;">
  
        {{-- <div class="old_messages_loader">Click to load older messages</div> --}}
  
        <div id="messages" style="min-height:300px; max-height:300px; overflow:auto; margin-top:5px;">
  
  
  
  
    
  
  
      </div>
  
  
      {{-- Send Message --}}
      <hr>
      <div style="display:flex; padding:15px;">
        <textarea name="message" id="" rows="2" style=""></textarea>
        <div style="margin-left:15px;">
          <button class="btn btn-primary" id="sendBtn" style="border-radius:10px;"><span class="material-icons" style="vertical-align:middle; font-size:24px !important;">send</span></button>
        </div>
      </div>
  
      </div>
                </div>
            </div>
        </div>


@endsection


@push('scripts')
<script>
  var currentUsersIdAuth = {{Auth::id()}};
</script>
<script src="{{asset('/js/chat.js')}}"></script>
<script>

</script>

<script>
  $(document).ready(function () {
    var channel_id = 'user.{{Auth::id()}}';
  Echo.private(channel_id)
    .listen('.userEvent', (e) => {
      console.log(e);
        var html = generateMessageHTML(e.data,currentUsersIdAuth);
        $('#messages').append(html);
    });

    var orderConvoId = {{$conversationID}};
    loadOrderChat(orderConvoId);
  });



@if(\Auth::id() == $order->buyer_id && $order->feedback_posted == 0 && ($order->status == '1' || $order->status == '3' || $order->status == '4'))
var stars = 1;

$(document).ready(function () {
  $('#feedbackModal').modal('show');

});



  $('.feedback-star').on('click',function(e) {
    stars = parseInt(this.dataset.stars);
    for(var i = 1; i<= stars; i++) {
      $('.feedback-star[data-stars="'+i+'"]').attr('src','/imgs/icons/star-full.svg');
    }
    for(var i = stars+1; i<= 5; i++) {
      $('.feedback-star[data-stars="'+i+'"]').attr('src','/imgs/icons/star-empty.svg');
    }
  });

  $('#submitFeedbackBtn').click(function (e) { 
    e.preventDefault();
    var anonymous = $('#anonymous').is(':checked');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      type: "POST",
      url: "/order/{{$order->id}}/submitFeedback",
      data: {id:{{$order->id}}, stars:stars, feedback:$('#feedback').val(), anonymous:anonymous},
      success: function (response) {
        Swal.fire('Your feedback has been noted. Thank you.');
        setTimeout(() => {
            Swal.close();
            window.location.reload();
        }, 1000);
      }
    });
  });


@endif


  
  @if($order->status == 0)
  var currentDateTime = "{{date('Y-m-d H:i:s')}}";
  function getTimeRemaining(endtime){
  const total = endtime * 1000;
  const minutes = Math.floor( (total/1000/60) % 60 );
  const hours = Math.floor( (total/(1000*60*60)) % 24 );
  const days = Math.floor( total/(1000*60*60*24) );
  const MyFormatHours = Number(days) * 24 + hours;
  const MyFormat = MyFormatHours + ':' + minutes;

  return {
    total,
    days,
    hours,
    minutes,
    MyFormatHours,
    MyFormat
  };
}

function confirmSubmit() {
  var agree= confirm("Are you sure you wish to release the payment to seller?");
  if (agree)
   return true;
  else
   return false;
}

function confirmCancel() {
  var agree= confirm("Are you sure you wish to cancel the order?");
  if (agree)
   return true;
  else
   return false;
}
function confirmDispute() {
  var agree= confirm("Are you sure you wish to dispute this order?");
  if (agree)
   return true;
  else
   return false;
}




  var orderEscrowReleaseTime2 = '{{$timeRemaining}}';
  var remainingTime = getTimeRemaining(orderEscrowReleaseTime2);
  $('#hours').text(remainingTime['MyFormatHours']);
  $('#minutes').text(remainingTime['minutes']);



setInterval(() => {
  orderEscrowReleaseTime2 = orderEscrowReleaseTime2 - 10;
  var remainingTime = getTimeRemaining(orderEscrowReleaseTime2);
  $('#hours').text(remainingTime['MyFormatHours']);
  $('#minutes').text(remainingTime['minutes']);
}, 1000 * 10);
@endif

</script>


@endpush