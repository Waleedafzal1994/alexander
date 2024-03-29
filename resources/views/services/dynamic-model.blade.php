<div class="modal-dialog modal-dialog-centered main-category-modal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Confirm Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="counter-section">
                <div class="img-section">
                    <img src="{{url($service->category->image_1) }}" alt="">
                    <div class="">
                        <h6 class="font-weight-bold">{{$service->category->name}}</h6>
                        <p class="mb-0">{{$service->user->name}}</p>
                    </div>
                </div>
                <div class="newdropdown">
                    <div class="dropdown w-100">
                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                            <div class="game-title" id="drop_down_select">{{$service->name}}</div>
                            <div class="game-price pr-3">
                                <img src="/imgs/icons/6.png" style="height:24px">
                                <span id="selected_drop_down_price">{{$service->price}}/{{$service->service_duration_type}}</span>
                            </div>
                        </a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1" id="lists_li">
                            <div class="scroll-div">

                                @if(!empty($all_remaining_services))
                                @foreach($all_remaining_services as $r_service)
                                <li role="presentation" class='{{ ($service->id == $r_service->id) ? "active" : ""}}' id="{{$r_service->id}}" onclick="singleServiceForSelect(this,this.id)">
                                    <a role="menuitem" tabindex="-1" id="{{$r_service->id}}">
                                        <div class="game-title">{{$r_service->name}}</div>
                                        <div class="game-price">
                                            <img src="/imgs/icons/6.png" style="height:24px" class="mr-1">
                                            <span>{{$r_service->price}}/{{$r_service->service_duration_type}}</span>
                                            <div class="final-price">Final Price: {{$r_service->price}}</div>
                                        </div>
                                        <i class="fa fa-check rounded-circle p-1"></i>
                                    </a>
                                </li>
                                @endforeach
                                @endif

                            </div>
                        </ul>
                    </div>


                    <!-- <select class="form-control select-service" name="select-service" >

                            @if(!empty($all_remaining_services))
                            @foreach($all_remaining_services as $r_service)
                            
                            <option {{ ($service->id == $r_service->id) ? "selected" : ''}} value="{{$r_service->id}}">{{$r_service->name}} </option>
                            @endforeach

                            @endif
                        </select> -->
                </div>

                <div class="number mt-3 d-flex align-items-center justify-content-between">
                    <p class="text-black">Units</p>
                    <div class="d-flex align-items-center">
                        <span class="minus ml-0">-</span>
                        <input name="unit-input" type="text" value="1" />
                        <span class="plus mr-0">+</span>
                    </div>
                </div>
            </div>

            <hr>

            <div class="mb-12 subtotal d-flex align-items-center justify-content-between">
                <p class="font-font-weight-bold mb-0">Subtotal</p>
                <p class="font-font-weight-bold mb-0">
                    <img src="/imgs/icons/6.png" style="height:24px; margin-left:5px;">
                    <span class="sub-total" id="sub-total">{{$service->price}}</span>
                </p>
            </div>

            <div class="mb-12 subtotal d-flex align-items-center justify-content-between">
                <p>Coupon</p>
                <p class="">
                    No Available Coupons <i class="fa fa-chevron-right"></i>
                </p>
            </div>

            <div class="mb-12 subtotal d-flex align-items-center justify-content-between">
                <p>Promo Code</p>
                <p class="">I have a Promo Code</p>
            </div>

            <hr>

            <div class="mt-4 subtotal final-price d-flex align-items-center justify-content-between">
                <p class="mb-0">Final Price</p>
                <div class="">
                    <p class="mb-0">
                        <span class="quantity" id="quantity"></span> Units(s) total
                        <img src="/imgs/icons/6.png" style="height:24px;">
                        <span class="font-weight-bold" id="totalPrice">{{$service->price}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="new-btn btn-secondary close" data-dismiss="modal">cancel</button>
            <button type="button" class="new-btn btn-primary confirm">Confirm</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var count = 1;
        var total = 0;
        var total_price = document.getElementById('totalPrice').innerHTML;
        if (count == 1) {
            $(".minus").css("pointer-events", "none");
        }
    });

    $(".close").click(function() {
        $("#exampleModal").modal('hide');
    });

    $('.dropdown').on('show.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });

    $('.dropdown').on('hide.bs.dropdown', function(e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
    });

    var count = 1;
    var total = 0;
    var total_price = document.getElementById('totalPrice').innerHTML;
    $('#quantity').text(count);
    $('.minus').click(function() {
        if (count == 1) {
            $(".minus").css("pointer-events", "none");
        } else {
            var $input = $(this).parent().find('input');
            count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            // Minus total value
            total = count * parseFloat(total_price);
            $('#totalPrice').text(total.toFixed(2));
            $('#sub-total').text(total.toFixed(2));
            $('#quantity').text(count);
            // End Here
            return false;
        }
    });
    $('.plus').click(function() {
        $(".minus").css("pointer-events", "auto");
        var $input = $(this).parent().find('input');
        count = parseInt($input.val()) + 1;
        total = count * parseFloat(total_price);
        $('#totalPrice').text(total.toFixed(2));
        $('#sub-total').text(total.toFixed(2));
        $('#quantity').text(count);
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });



    // });

    function singleServiceForSelect(obj, id) {

        var id = $(obj).id;
        console.log(id);
        console.log(obj);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "/services/getSingleServiceForSelect",
            data: {
                'id': id
            },
            dataType: 'JSON',
            success: function(response) {

                $('li').removeClass('active');
                $(obj).addClass('active');
                $('#drop_down_select').text(response.name);
                $('#selected_drop_down_price').text(response.price + '/' + response.service_duration_type);
                $('input[name="unit-input"]').val(1)
                $('#totalPrice').text(response.price);
                $('#sub-total').text(response.price);


            }
        });
    }
</script>