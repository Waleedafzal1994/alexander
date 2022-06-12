<div class="card-body bg-white shadow rounded py-5">
    <div class="service-main-body-content">
        <div class="d-flex justify-content-between">
            <div class="font-weight-600 margin-bottom-1rem">
                <h1 id="categoryName" class="skew-bg py-4 mb-3">
                    <span>{{$service->category->name}}</span>
                </h1>
                <!-- <span class="number-row-card ms-2 bg-purple-gradient p-3 rounded text-white">
                    {{ $service->average_rate > 0 ? $service->average_rate : 0 }}
                    <i class="fas fa-star"></i>
                </span> -->

            </div>
            <div class="font-weight-600 margin-bottom-1rem">
                <span id="{{$minPrice->id}}" onclick="openComfirmOrderModel(this.id)">
                    <button id="buyBtn" class="btn-block btn-primary btn-right-50">PLAY</button>
                    <!-- <button id="buyBtn" class="btn-block btn-primary btn-right-50">Order
                                    ({{ $service->price ?: '0' }} GP)
                                </button> -->
                </span>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-7 mt-1 text-justify margin-bottom-1rem">
                <p>{{$service->category->description}}</p>
            </div>
            @if (!empty($service->category) && isset($service->category->image_1) && !empty($service->category->image_1))
            <div class="col-12 col-md-5 text-right ">
                <div class="lightbox lightbox-user-gallery">
                    <!-- <a href="#" class="pop"> -->
                    <img id="img03" src='/{{ $service->category->image_1 }}' alt="" class="img-fluid border-radius-30 service-big-image zoom-clicked-img" />
                    <!-- </a> -->
                </div>
            </div>
            @endif
        </div>



        @if(!empty($all_remaining_services))
        @foreach($all_remaining_services as $r_service)
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="box-styling shadow" type="button" id="{{$r_service->id}}" onclick="openComfirmOrderModel(this.id)">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="subcategory">
                            <h5 class="mb-0">{{$r_service->name}}</h5>
                        </div>
                        <div class="rateMin d-flex align-items-center">
                            <div class="mr-2">
                                <img src="/imgs/icons/6.png" style="height:24px; margin-left:5px;">
                            </div>
                            <div class="mr-2">
                                <p class="mb-0">{{$r_service->price}}/{{$r_service->service_duration_type}}</p>
                            </div>
                            <div class="right-arrow ml-4">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>