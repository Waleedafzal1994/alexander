

<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12 badge-cards d-flex align-items-center flex-wrap">
                @if($totalOrders >= 50 && $totalOrders < 100) 
                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 50 XP Gained !</div>
                    </div>
                </div>
                @elseif($totalOrders >= 100 && $totalOrders < 500)
                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 50 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 100 XP Gained !</div>
                    </div>
                </div>
                @elseif($totalOrders>= 500 && $totalOrders < 1000)

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 50 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 100 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">500 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 500 XP Gained !</div>
                    </div>
                </div>
                @elseif($totalOrders>= 1000)

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 50 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 100 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">500 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 500 XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">1k Orders Completed</div>
                        <div class="gained font-weight-bold">+ 1k XP Gained !</div>
                    </div>
                </div>
                @endif

                 @if(!empty($service->user->general_badge))

                @php
                $g_badge = explode(',',$service->user->general_badge)
                @endphp

                @if(in_array('elite',$g_badge))

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">ELITE GP+</div>
                        <!-- <div class="gained font-weight-bold">VIP+</div> -->
                    </div>
                </div>

                @endif

                @if(in_array('top',$g_badge))

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">Top GP+</div>
                        <!-- <div class="gained font-weight-bold">VIP+</div> -->
                    </div>
                </div>

                @endif

                @if(in_array('vip',$g_badge))

                <div class="card badge-card border-0 py-4 my-3">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">VIP+</div>
                        <!-- <div class="gained font-weight-bold">VIP+</div> -->
                    </div>
                </div>
                @endif

                @endif

        </div>
    </div>
</div>
</div>
</div>