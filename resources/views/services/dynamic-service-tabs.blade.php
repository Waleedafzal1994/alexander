
            <div class="card-body ">
                <div class="service-main-body-content">
                    <div class="d-flex justify-content-between">
                        <div class="font-weight-600 margin-bottom-1rem">
                            <h1 id="categoryName" class="skew-bg py-4">
                                <span>{{$service->category->name}}</span>
                            </h1>
                            <span class="number-row-card ms-2">
                                <i class="fas fa-star"></i>
                                {{ $service->average_rate > 0 ? $service->average_rate : 0 }}</span>
                            
                        </div>
                        <div class="font-weight-600 margin-bottom-1rem">
                            <span id="{{$service->id}}" onclick="openComfirmOrderModel(this.id)">
                                <button id="buyBtn" class="btn-block btn-primary btn-right-50">PLAY</button>
                                <!-- <button id="buyBtn" class="btn-block btn-primary btn-right-50">Order
                                    ({{ $service->price ?: '0' }} GP)
                                </button> -->
                            </span>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-7 mt-1 text-justify margin-bottom-1rem">
                            <p>{{$service->category->description}}</p>
                        </div>
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
        