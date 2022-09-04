<div class="card-body bg-white shadows rounded py-5 pl-0">
    <div class="service-main-body-content">

        <?php $checkBlockedUser = checkUserBloked($service->user->id)?>

        @if(!empty($checkBlockedUser))

            <?php $getUser = getUserById($checkBlockedUser->blocker_id)?>
            <div class="col-md-12">
                <p>This user is blocked by <a href="/user-profile/{{$getUser->id}}">{{$getUser->name}}</a></p>
            </div>  
        @endif
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="font-weight-600 margin-bottom-1rem d-flex align-items-center">
                <h1 id="categoryName" class="skew-bg py-4 mr-5">
                    <span>{{$service->category->name}}</span>
                </h1>
                <!-- <div class="highlights mt-3 ml-3">
                    <button class="new-btn text-white px-4 py-3 br-10">HIGHLIGHTS</button>
                </div> -->
                <!-- <span class="number-row-card ms-2 bg-purple-gradient p-3 rounded text-white">
                    {{ $service->average_rate > 0 ? $service->average_rate : 0 }}
                    <i class="fas fa-star"></i>
                </span> -->
                <div class="served ml-3 mr-3">
                    <div class="new-btn new-purple-gradient text-white border-0 number-row-card">
                        <i class="fas fa-star"></i> 5.0 <span class="dot"> . </span> 1258 Served
                    </div>
                </div>
            </div>
            <div class="font-weight-600 margin-bottom-1rem">
                <span id="{{$minPrice->id}}" onclick="openComfirmOrderModel(this.id)">
                    <button id="buyBtn" class="btn-right-50 mt-0"> 
                    <svg width="22" class="mr-1" height="24" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16647 27.9558C9.25682 27.9856 9.34946 28.0001 9.44106 28.0001C9.71269 28.0001 9.97541 27.8732 10.1437 27.6467L21.5954 12.2248C21.7926 11.9594 21.8232 11.6055 21.6746 11.31C21.526 11.0146 21.2236 10.8282 20.893 10.8282H13.1053V0.874999C13.1053 0.495358 12.8606 0.15903 12.4993 0.042327C12.1381 -0.0743215 11.7428 0.0551786 11.5207 0.363124L0.397278 15.7849C0.205106 16.0514 0.178364 16.403 0.327989 16.6954C0.477614 16.9878 0.77845 17.1718 1.10696 17.1718H8.56622V27.125C8.56622 27.5024 8.80816 27.8373 9.16647 27.9558ZM2.81693 15.4218L11.3553 3.58389V11.7032C11.3553 12.1865 11.7471 12.5782 12.2303 12.5782H19.1533L10.3162 24.479V16.2968C10.3162 15.8136 9.92444 15.4218 9.44122 15.4218H2.81693Z" fill="#fff"></path></svg>
                        PLAY</button>
                    <!-- <button id="buyBtn" class="btn-block btn-primary btn-right-50">Order
                                    ({{ $service->price ?: '0' }} GP)
                                </button> -->
                </span>
            </div>
        </div>
        <div class="row mt-5 pl-20">
            <div class="col-sm-12 col-md-7 mt-1 text-justify margin-bottom-1rem">
                <p class="text-black">{{$service->category->description}}</p>
            </div>
            @if (!empty($service->category) && isset($service->category->image_1) && !empty($service->category->image_1))
            <div class="col-12 col-md-5 text-right mb-5">
                <div class="lightbox lightbox-user-gallery">
                    <!-- <a href="#" class="pop"> -->
                    <img id="img03" src='/{{ $service->category->image_1 }}' alt="" class="pointer img-fluid border-radius-30 service-big-image zoom-clicked-img" />
                    <!-- </a> -->
                </div>
            </div>
            @else
            <div></div>
            @endif
        </div>



        @if(!empty($all_remaining_services))
        @foreach($all_remaining_services as $r_service)
        <div class="row mt-3 pl-20">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="box-styling" type="button" id="{{$r_service->id}}" onclick="openComfirmOrderModel(this.id)">

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