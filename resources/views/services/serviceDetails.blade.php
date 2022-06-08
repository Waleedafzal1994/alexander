<div class="main-services">
    <div id="" class="service_category main-category">
        <ul class="menu_ul nav nav-pills top-head-cate" id="pills-tab" role="tablist">

            @include('services.categories-list')
        </ul>
    </div>

    <div class="card mt-2 p-3 tab-content shadow" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            @include('services.dynamic-service-tabs')
        </div>

        <!-- <div class="tab-pane more_section"> -->
        <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="card-body ">
                <div class="service-main-body-content">
                    <!-- <div id="more_section_content" class="service_category  main-category"> -->
                    <div  class="service_category  main-category">

                        <div class="row">

                            <div class="col-md-12">
                                
                                 <div class="col-lg-4" id="{{!empty($service->category->id) ? $service->category->id : ''}}" onclick="getCategoryServices(this,this.id)">
                                    @if ($service->category->image_1 != null)

                                        <img src="{{ url($service->category->image_1) }}">

                                    @else

                                    <div style="background:var(--color-secondary);">
                                        
                                    </div>

                                    @endif
                                    <h2>{{ $service->category->name }}  <small>{{ $minPrice->minPrice .'/'. $minPrice->service_duration_type }}</small></h2>
                                </div>

                                <?php $i = 1 ?>
                                @if(!empty($all_remaining_cats))
                                @foreach($all_remaining_cats as $category)
                                <div class="col-lg-4" id="{{$category->id}}" onclick="getCategoryServices(this,this.id)">

                                    @if ($category->image_1 != null)

                                        <img src="{{ url($category->image_1) }}">

                                    @else

                                    <div style="background:var(--color-secondary);">
                                        
                                    </div>

                                    @endif
                                    <h2>{{ $category->name }}  <small>{{ $category->minPrice .'/'. $category->service_duration_type }}</small></h2>
                                </div>

                                <?php $i++; ?>
                                @endforeach
                                @endif

                            </div>
                            
                        </div>

                       

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

        function getCategoryServices(obj,id) {

            $('.nav-item').removeClass('active');
            $(obj).addClass('active');

            var user_id = '<?php echo $service->user->id; ?>';
            var cat_ord_arr = $('#cat_ord_arr').val();
        //alert(cat_ord_arr);



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
                    'cat_ord_arr': cat_ord_arr,
                    user_id: user_id
                },
                success: function(response) {



                    $('#pills-home').html(response.html);
                    $('#pills-home').addClass('show active');


                    // $('#pills-contact').removeClass('show active');


                    $('#more_section').show();
                    $('#more_section_content').show();



                //top-head-categories//
                if (response.html2 != '')
                {
                    $('.top-head-cate').html(response.html2);
                }




                },
                error: function(data) {
                //console.log(data);
                }
            });
        }
</script>