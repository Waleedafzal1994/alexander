<li class="nav-item active" id="{{!empty($service->category->id) ? $service->category->id : ''}}" value="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this,this.id)">
    @if ($service->category->image_1 != null)



    <div class="categories_box_holder" style="background-image:url('{{url($service->category->image_1) }}');">
        @else
        <div class="categories_box_holder" style="background:var(--color-secondary);">
        </div>
    </div>
    @endif
    <!-- <p>{{ $service->category->name }}</p> -->
</li>



<?php $i = 1;
$order_arr = array();
$order_arr[0] = $service->category->id; ?>
@if(!empty($all_remaining_cats))
@foreach($all_remaining_cats as $category)



<?php array_push($order_arr, $category->id); ?>



<li class="nav-item" id="{{$category->id}}" onclick="getCategoryServices(this,this.id)" role="presentation" value="{{$category->id}}">
    <!-- IF STAART HERE -->
    @if($category->image_1 != null)
    <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.0),rgba(0,0,0,0.0)),url({{url($category->image_1)}});">



    </div>
    @else
    <div class="categories_box_holder" style="background:var(--color-secondary);">
    </div>
    @endif



    <!-- ENd Here -->
    <!-- <p>{{ $category->name }}</p> -->
</li>



@if($i >= 3)
@break



@endif
<?php $i++; ?>
@endforeach



<input type="hidden" name="" id="cat_ord_arr" value="<?= !empty($order_arr) ? implode(',', $order_arr) : ''; ?>">

@endif

@if(!empty($all_remaining_cats) && (count($all_remaining_cats) >=4))

<li class="nav-item more-section mr-0" role="presentation" id="{{$category->id}}" onclick="getCategoryServices(this,'more')" >
    <!-- IF STAART HERE -->
    <!-- <div class="nav-link p-0" id="more_section"> -->
    <a class="nav-link p-0 ml-auto menu-icon" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="background-image:url({{asset('imgs/more-services-img.svg')}}) !important; backdrop-filter: blur(4px); background-repeat: no-repeat;" >
        <div class="categories_box_holder">
            <!-- Else Section
                <div class="categories_box_holder" style="background:var(--color-secondary);">
                            </div>
            Else Section ENd Here -->
        <!-- ENd Here -->
            <div class="d-flex align-items-end">
                <p class="text-white mb-0">Browse <br> more Services</p>
                <div class="d-flex mb-1">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" class="mr-2" alt="">
                    <img src="{{asset('imgs/icons/service-arrow.svg')}}" alt="">
                </div>
            </div>
        </div>
    </a>
    <!-- </div> -->
</li>
@endif