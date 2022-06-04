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
                        <!-- <button class="new-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Dropdown button
                                    </button>
                                    <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div> -->
                        <select class="form-control select-service" name="select-service" >

                            @if(!empty($all_remaining_services))
                            @foreach($all_remaining_services as $r_service)
                            
                            <option {{ ($service->id == $r_service->id) ? "selected" : ''}} value="{{$r_service->id}}">{{$r_service->name}} </option>
                            @endforeach

                            @endif
                        </select>
                    </div>
                </div>

                <div class="number mt-3 d-flex align-items-center justify-content-between">
                    <p>Units</p>
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
                    <img width="20px" height="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAABm1BMVEUAAACDav////+EZO5rXv16YvRsX/xvYPqGZO9vYPqLZe1wYPt7Y/Z3aP+IaPOHcf9xYfl4YvVxX/mGZe1tX/uCZPGHZe6BY/F1YfeIZu5wZv+KZvBqXv2JZuxrX/yJZOtzYfiJZe14YvZ9Y/OKZuxwYPqJZOyMZ+x3YvV9Y/GAZPFrYPxrX/yAY/CCZfJtYP9qYP91ZviDZvCAY/BvX/ltX/p4YfR6YvNxYPd0YPZyYPiDY++FZO19YvFzYPeCY+6GZO12YfVrXvt5YfR+Y/F/YvCEZO51YfZ7YfJ8YvOHZOtwYPlwX/f/uEB1YPaIZez/pkX/qET/qkT/tUH/uz+JZOz/sEL/vT/6qkn/rEP/s0LLlIf/rUP/ukD6oUz+pEaFaOaGaeGVctCeeMSngLf/vz9uX/uCY/B9ZOqLbNyQbtaXdM6YcsiufK6yg6m7jZ3Flo7LjYjPnILQjYHcpm/vnVrrs1n1nVL1u0z6tkehdryieruneba4hJ+5g56/hpfAkJTFiY/Xl3bhqmjjombtplnzqFPzslD9qUZy5oOZAAAAM3RSTlMADAHzgH/zv7+lf3JSFhYJ8+jZ2dbVpYGAciMj/vPo6NPTqqqqg4NS8/PoqqqlclJSIyMny+XFAAADCUlEQVQ4y3XUZ1/iQBAG8KWDiL33fr2iCSBFMIGYaChSDg+7nr3X67187JvZ3QDe6bzl/3tmJhlCblZ3Z5uz2WJpdrZ1dpM7q25sUFXVKahgMB6JtLbX3cpMNb1qMqmCAhaPT0Ymtyztpv/dvX5VTdK8OMaB83q98sPaf5i5JpfL8TzqgCGUJZu52tWPqDkWhwzbMiVLUmi4vipvxGDgkIFb81IWCs0MVzJrcmqSx9HxIG79GBwyRRFt5T3AGQ+FxXn3rjdY3IwiiiLfyNSfTNKulW13rwsr6CBOEaeFRhNrDPMxh4G47M7l5rnE4pRpgAJtXtfLu5afysrlZuGIjSciE6L3PQDHwEFYEBR1cvD7ZqGwFlJmkIEDGO0AOEjngzTWVo6cF7LZ39BXVKiLQukDcC9T7NVCUSefgps7rY6LJhL+F6STbRsx3HEhuzg3t6Gg40xP+P1u0oY3gHHUSUdZdPMr4FhcApQ/HHYRZxDaRowTOKRs/ocoCkZbZGGfgzTTvoxJG4vULeRf0ToRErofyufzNRGLsYUkh9bfUraQz5eKxUz6RNChMcRBNRBLua20h26BulImk/4axTxgAV8g0EBat5DhqchfXmP9zOcxLv1Z1zGOslmtiThpWuVUQr9KRYhLfcKukIdsVht3kCcAkeGp4MN7XyoCSx3q9LEEAGrjUC7y1ItxmMdexrcMugP2VJBpCCfc5KUshwDiRaFb/ZNOp5Y/YJqfj4duoouQVn557KQ+QtzSO8jDNaBAoWshhLSDo9OhEy5Sy0vrzPkgbRYZ1Cge7gM+HZ7UPrh9Nh1vi+6N3UOgbBDIXfRs+WoNp0MGirlYzMr+XI2Qh0yIbi9d7YahL7BKXCzWxz9Btcbl6QcXO5TBeNxhXs8zwsvGLz5xtsrH07RyW2xslHmIXfL2qp+/NMYYfGyu+kgNAeMnhUwzGNSjemZ4Zoee4GlsXYP1WCt5fKPGsJFX5fqe3/Jp7migTqswu9VEbivP6ACo8rYtVg+5s7rcLkeT3d7icLm7bv7yF5xoPVJ1zHVQAAAAAElFTkSuQmCC">
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
                        <img width="20px" height="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAABm1BMVEUAAACDav////+EZO5rXv16YvRsX/xvYPqGZO9vYPqLZe1wYPt7Y/Z3aP+IaPOHcf9xYfl4YvVxX/mGZe1tX/uCZPGHZe6BY/F1YfeIZu5wZv+KZvBqXv2JZuxrX/yJZOtzYfiJZe14YvZ9Y/OKZuxwYPqJZOyMZ+x3YvV9Y/GAZPFrYPxrX/yAY/CCZfJtYP9qYP91ZviDZvCAY/BvX/ltX/p4YfR6YvNxYPd0YPZyYPiDY++FZO19YvFzYPeCY+6GZO12YfVrXvt5YfR+Y/F/YvCEZO51YfZ7YfJ8YvOHZOtwYPlwX/f/uEB1YPaIZez/pkX/qET/qkT/tUH/uz+JZOz/sEL/vT/6qkn/rEP/s0LLlIf/rUP/ukD6oUz+pEaFaOaGaeGVctCeeMSngLf/vz9uX/uCY/B9ZOqLbNyQbtaXdM6YcsiufK6yg6m7jZ3Flo7LjYjPnILQjYHcpm/vnVrrs1n1nVL1u0z6tkehdryieruneba4hJ+5g56/hpfAkJTFiY/Xl3bhqmjjombtplnzqFPzslD9qUZy5oOZAAAAM3RSTlMADAHzgH/zv7+lf3JSFhYJ8+jZ2dbVpYGAciMj/vPo6NPTqqqqg4NS8/PoqqqlclJSIyMny+XFAAADCUlEQVQ4y3XUZ1/iQBAG8KWDiL33fr2iCSBFMIGYaChSDg+7nr3X67187JvZ3QDe6bzl/3tmJhlCblZ3Z5uz2WJpdrZ1dpM7q25sUFXVKahgMB6JtLbX3cpMNb1qMqmCAhaPT0Ymtyztpv/dvX5VTdK8OMaB83q98sPaf5i5JpfL8TzqgCGUJZu52tWPqDkWhwzbMiVLUmi4vipvxGDgkIFb81IWCs0MVzJrcmqSx9HxIG79GBwyRRFt5T3AGQ+FxXn3rjdY3IwiiiLfyNSfTNKulW13rwsr6CBOEaeFRhNrDPMxh4G47M7l5rnE4pRpgAJtXtfLu5afysrlZuGIjSciE6L3PQDHwEFYEBR1cvD7ZqGwFlJmkIEDGO0AOEjngzTWVo6cF7LZ39BXVKiLQukDcC9T7NVCUSefgps7rY6LJhL+F6STbRsx3HEhuzg3t6Gg40xP+P1u0oY3gHHUSUdZdPMr4FhcApQ/HHYRZxDaRowTOKRs/ocoCkZbZGGfgzTTvoxJG4vULeRf0ToRErofyufzNRGLsYUkh9bfUraQz5eKxUz6RNChMcRBNRBLua20h26BulImk/4axTxgAV8g0EBat5DhqchfXmP9zOcxLv1Z1zGOslmtiThpWuVUQr9KRYhLfcKukIdsVht3kCcAkeGp4MN7XyoCSx3q9LEEAGrjUC7y1ItxmMdexrcMugP2VJBpCCfc5KUshwDiRaFb/ZNOp5Y/YJqfj4duoouQVn557KQ+QtzSO8jDNaBAoWshhLSDo9OhEy5Sy0vrzPkgbRYZ1Cge7gM+HZ7UPrh9Nh1vi+6N3UOgbBDIXfRs+WoNp0MGirlYzMr+XI2Qh0yIbi9d7YahL7BKXCzWxz9Btcbl6QcXO5TBeNxhXs8zwsvGLz5xtsrH07RyW2xslHmIXfL2qp+/NMYYfGyu+kgNAeMnhUwzGNSjemZ4Zoee4GlsXYP1WCt5fKPGsJFX5fqe3/Jp7migTqswu9VEbivP6ACo8rYtVg+5s7rcLkeT3d7icLm7bv7yF5xoPVJ1zHVQAAAAAElFTkSuQmCC">
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
    $(".close").click(function() {
        $("#exampleModal").modal('hide');
    });

    $(document).ready(function() {
        
    })

    var count = 1;
        var total = 0;
        var total_price = document.getElementById('totalPrice').innerHTML;
        $('#quantity').text(count);
        // console.log(total_price);
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            console.log(count, 'minus');
            // Minus total value
            total = count * parseFloat(total_price);
            $('#totalPrice').text(total);
            $('#sub-total').text(total);
            $('#quantity').text(count);
            // console.log(total_price);
            $('.minus').click(function() {
                var $input = $(this).parent().find('input');
                count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                console.log(count, 'minus');
                // Minus total value
                total = count * parseFloat(total_price);
                $('#totalPrice').text(total);
                $('#sub-total').text(total);
                $('#quantity').text(count);
                console.log(total);
                // End Here
                return false;
            });
            $('.plus').click(function() {
                var $input = $(this).parent().find('input');
                count = parseInt($input.val()) + 1;
                console.log(count);
                total = count * parseFloat(total_price);
                $('#totalPrice').text(total);
                $('#sub-total').text(total);
                $('#quantity').text(count);
                console.log(total);
                // console.log($input.val(parseInt($input.val()) + 1))
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
            

            
        });

    $('select[name="select-service"]').change(function() {
        var id = $(this).val();
    
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

                $('input[name="unit-input"]').val(1)
                $('#totalPrice').text(response.price);
                $('#sub-total').text(response.price);


            }
        });
    });
</script>