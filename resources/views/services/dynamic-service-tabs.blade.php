
            <div class="card-body ">
                <div class="service-main-body-content">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 font-weight-600 margin-bottom-1rem">
                            <h1 id="categoryName">{{$service->category->name}}</h1>
                            <span class="number-row-card ms-2">
                                <i class="fas fa-star"></i>
                                {{ $service->average_rate > 0 ? $service->average_rate : 0 }}</span>
                            
                        </div>
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6 margin-bottom-1rem ">
                            <span id="{{$service->id}}" onclick="openComfirmOrderModel(this.id)">
                                <button id="buyBtn" class="btn-block btn-primary btn-right-50">Order
                                    ({{ $service->price ?: '0' }} GP)
                                </button>
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
                                <div class="box-styling" type="button" id="{{$r_service->id}}" onclick="openComfirmOrderModel(this.id)">
                                   
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="subcategory">
                                            <h5 class="mb-0">{{$r_service->name}}</h5>
                                        </div>
                                        <div class="rateMin d-flex align-items-center">
                                            <div class="mr-2">
                                                <img width="20px" height="20px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAABm1BMVEUAAACDav////+EZO5rXv16YvRsX/xvYPqGZO9vYPqLZe1wYPt7Y/Z3aP+IaPOHcf9xYfl4YvVxX/mGZe1tX/uCZPGHZe6BY/F1YfeIZu5wZv+KZvBqXv2JZuxrX/yJZOtzYfiJZe14YvZ9Y/OKZuxwYPqJZOyMZ+x3YvV9Y/GAZPFrYPxrX/yAY/CCZfJtYP9qYP91ZviDZvCAY/BvX/ltX/p4YfR6YvNxYPd0YPZyYPiDY++FZO19YvFzYPeCY+6GZO12YfVrXvt5YfR+Y/F/YvCEZO51YfZ7YfJ8YvOHZOtwYPlwX/f/uEB1YPaIZez/pkX/qET/qkT/tUH/uz+JZOz/sEL/vT/6qkn/rEP/s0LLlIf/rUP/ukD6oUz+pEaFaOaGaeGVctCeeMSngLf/vz9uX/uCY/B9ZOqLbNyQbtaXdM6YcsiufK6yg6m7jZ3Flo7LjYjPnILQjYHcpm/vnVrrs1n1nVL1u0z6tkehdryieruneba4hJ+5g56/hpfAkJTFiY/Xl3bhqmjjombtplnzqFPzslD9qUZy5oOZAAAAM3RSTlMADAHzgH/zv7+lf3JSFhYJ8+jZ2dbVpYGAciMj/vPo6NPTqqqqg4NS8/PoqqqlclJSIyMny+XFAAADCUlEQVQ4y3XUZ1/iQBAG8KWDiL33fr2iCSBFMIGYaChSDg+7nr3X67187JvZ3QDe6bzl/3tmJhlCblZ3Z5uz2WJpdrZ1dpM7q25sUFXVKahgMB6JtLbX3cpMNb1qMqmCAhaPT0Ymtyztpv/dvX5VTdK8OMaB83q98sPaf5i5JpfL8TzqgCGUJZu52tWPqDkWhwzbMiVLUmi4vipvxGDgkIFb81IWCs0MVzJrcmqSx9HxIG79GBwyRRFt5T3AGQ+FxXn3rjdY3IwiiiLfyNSfTNKulW13rwsr6CBOEaeFRhNrDPMxh4G47M7l5rnE4pRpgAJtXtfLu5afysrlZuGIjSciE6L3PQDHwEFYEBR1cvD7ZqGwFlJmkIEDGO0AOEjngzTWVo6cF7LZ39BXVKiLQukDcC9T7NVCUSefgps7rY6LJhL+F6STbRsx3HEhuzg3t6Gg40xP+P1u0oY3gHHUSUdZdPMr4FhcApQ/HHYRZxDaRowTOKRs/ocoCkZbZGGfgzTTvoxJG4vULeRf0ToRErofyufzNRGLsYUkh9bfUraQz5eKxUz6RNChMcRBNRBLua20h26BulImk/4axTxgAV8g0EBat5DhqchfXmP9zOcxLv1Z1zGOslmtiThpWuVUQr9KRYhLfcKukIdsVht3kCcAkeGp4MN7XyoCSx3q9LEEAGrjUC7y1ItxmMdexrcMugP2VJBpCCfc5KUshwDiRaFb/ZNOp5Y/YJqfj4duoouQVn557KQ+QtzSO8jDNaBAoWshhLSDo9OhEy5Sy0vrzPkgbRYZ1Cge7gM+HZ7UPrh9Nh1vi+6N3UOgbBDIXfRs+WoNp0MGirlYzMr+XI2Qh0yIbi9d7YahL7BKXCzWxz9Btcbl6QcXO5TBeNxhXs8zwsvGLz5xtsrH07RyW2xslHmIXfL2qp+/NMYYfGyu+kgNAeMnhUwzGNSjemZ4Zoee4GlsXYP1WCt5fKPGsJFX5fqe3/Jp7migTqswu9VEbivP6ACo8rYtVg+5s7rcLkeT3d7icLm7bv7yF5xoPVJ1zHVQAAAAAElFTkSuQmCC">
                                            </div>
                                            <div class="mr-2">
                                                <p class="mb-0">{{$r_service->price}}/{{$r_service->service_duration_type}}</p>
                                            </div>
                                            <div class="right-arrow ml-4">
                                                <i class="fa fa-chevron right"></i>
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
        