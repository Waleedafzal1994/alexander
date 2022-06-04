<li class="nav-item active" id="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this.id)">
    @if ($service->category->image_1 != null)

    <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('{{url($service->category->image_1) }}');">
        @else
        <div class="categories_box_holder" style="background:var(--color-secondary);">
        </div>
    </div>
    @endif
    <p>{{ $service->category->name }}</p>
</li>

<?php $i = 1 ?>
@if(!empty($all_remaining_cats))
@foreach($all_remaining_cats as $category)

<li class="nav-item" id="{{$category->id}}" onclick="getCategoryServices(this.id)" role="presentation">
    <!-- IF STAART HERE -->
    @if(!empty($category->image_1))
    <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{url($category->image_1)}});">

    </div>
    @else
    <div class="categories_box_holder" style="background:var(--color-secondary);">
    </div>
    @endif

    <!-- ENd Here -->
    <p>{{ $category->name }}</p>
</li>

@if($i >= 4)
@break

@endif
<?php $i++; ?>
@endforeach
@endif

@if(!empty($all_remaining_cats) && (count($all_remaining_cats) >=4))

<li class="nav-item" role="presentation">
    <!-- IF STAART HERE -->
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
        <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3))">
            <!-- Else Section -->
            <!-- <div class="categories_box_holder" style="background:var(--color-secondary);">
                            </div> -->
            <!-- Else Section ENd Here -->
        </div>
        <!-- ENd Here -->
        <p>More</p>
    </a>
</li>
@endif