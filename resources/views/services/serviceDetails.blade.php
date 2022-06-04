<div class="main-services">
    <div id="" class="service_category  main-category">
        <ul class="menu_ul nav nav-pills top-head-cate" id="pills-tab" role="tablist">

            @include('services.categories-list')
        </ul>
    </div>

    <div class="card mt-2 p-3 tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            @include('services.dynamic-service-tabs')
        </div>




        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="card-body ">
                <div class="service-main-body-content">
                    <div id="" class="service_category  main-category">
                        <ul class="menu_ul nav nav-pills" id="pills-tab" role="tablist">

                            <li class="nav-item active" id="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this.id)">
                                @if ($service->category->image_1 != null)
                                <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('{{ url($service->category->image_1) }}');">
                                    @else
                                    <div class="categories_box_holder" style="background:var(--color-secondary);">
                                    </div>
                                </div>
                                @endif
                                <p>{{ $service->category->name }} {{ $minPrice->minPrice .'/'. $minPrice->service_duration_type }}</p>
                            </li>

                            <?php $i = 1 ?>
                            @if(!empty($all_remaining_cats))
                            @foreach($all_remaining_cats as $category)

                            <li class="nav-item " role="presentation" id="{{$category->id}}" onclick="getCategoryServices(this.id)">
                                <!-- IF STAART HERE -->
                                @if(!empty($category->image_1))
                                <div class="categories_box_holder" style="background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{url($category->image_1)}});">

                                </div>
                                @else
                                <div class="categories_box_holder" style="background:var(--color-secondary);">
                                </div>
                                @endif

                                <!-- ENd Here -->
                                <p>{{ $category->name }} {{ $category->minPrice .'/'. $category->service_duration_type }}</p>

                            </li>

                            <?php $i++; ?>
                            @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <div class="modal fade" id="exampleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        </div>

        <div class=" card mt-4 p-3">
            <div class="card-body">
                <div class="service-main-body-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="d-flex review-header">
                                <h5 class="color-primary fw-bold">Service Review(s)</h5>
                                <span class="line"></span>
                                <span class="number-row-card ms-2">
                                    <i class="fas fa-star"></i>
                                    {{ $service->average_rate }}</span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function categoryId(id) {
            console.log(id, 'ID')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: "/getCategoriesInfo/",
                data: {
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                    // if (response.status === '1') {
                    $('#categoryName').html(response.name);
                    $('#categoryDesc').text(response.description);
                    // $('.count-following').text(response.totalfollowing);
                    // $('.followers-result').html(response.followersListhtml);
                    // $('.following-result').html(response.followingListhtml);
                    // }
                    // if (response.error === '1') {
                    // Swal.fire(response.msg);
                    // }    
                },
                error: function(data) {
                    //console.log(data);
                }
            });


        }

        function openComfirmOrderModel(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/services/getServiceInfoForModel/",
                data: {
                    'id': id
                },
                success: function(response) {

                    $('#exampleModal').html(response);
                    $('#exampleModal').modal('show');


                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }

        function getCategoryServices(id) {

            var user_id = '<?php echo $service->user->id; ?>';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "/services/getServiceDetailsForTab/",
                data: {
                    'id': id,
                    user_id: user_id
                },
                success: function(response) {

                    $('#pills-home').html(response.html);
                    $('#pills-home').addClass('show active');
                    $('#pills-contact').removeClass('show active');

                    //top-head-categories//
                    $('.top-head-cate').html(response.html2);


                },
                error: function(data) {
                    //console.log(data);
                }
            });
        }
    </script>