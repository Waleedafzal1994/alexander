<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12">
                    <?php $totalOrders = 900; ?>
                    @if($totalOrders > 0)
                    <div class="post-box">
                        <div class="central-meta item post-item-box border-0 p-0" style="display: inline-block;" id="post-item-box-1">
                            <!-- New Badge cards content -->
                            <div class="badge-cards row d-flex align-items-center justify-content-around flex-wrap">
                                @if($totalOrders >= 1 && $totalOrders <=50) <div class="card badge-card border-0 py-4 my-4">
                                    <div class="card-body text-center">
                                        <div class="badge-img">
                                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                                        </div>
                                        <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                                        <div class="gained font-weight-bold">+ 50 ELITE XP Gained !</div>
                                    </div>
                            </div>

                            @elseif($totalOrders >= 51 && $totalOrders <= 100) <div class="card badge-card border-0 py-4 my-4">
                                <div class="card-body text-center">
                                    <div class="badge-img">
                                        <img src="/imgs/elitegpbadge.png" width="220" alt="">
                                    </div>
                                    <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                                    <div class="gained font-weight-bold">+ 50 ELITE XP Gained !</div>
                                </div>
                        </div>

                        <div class="card badge-card border-0 py-4 my-4">
                            <div class="card-body text-center">
                                <div class="badge-img">
                                    <img src="/imgs/topgpbadge.png" width="220" alt="">
                                </div>
                                <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                                <div class="gained font-weight-bold">+ 100 TOP XP Gained !</div>
                            </div>
                        </div>

                        @elseif($totalOrders >= 101 && $totalOrders <= 500) <div class="card badge-card border-0 py-4 my-4">
                            <div class="card-body text-center">
                                <div class="badge-img">
                                    <img src="/imgs/elitegpbadge.png" width="220" alt="">
                                </div>
                                <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                                <div class="gained font-weight-bold">+ 50 ELITE XP Gained !</div>
                            </div>
                    </div>

                    <div class="card badge-card border-0 py-4 my-4">
                        <div class="card-body text-center">
                            <div class="badge-img">
                                <img src="/imgs/topgpbadge.png" width="220" alt="">
                            </div>
                            <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                            <div class="gained font-weight-bold">+ 100 TOP XP Gained !</div>
                        </div>
                    </div>

                    <div class="card badge-card border-0 py-4 my-4">
                        <div class="card-body text-center">
                            <div class="badge-img">
                                <img src="/imgs/elitegpbadge.png" width="220" alt="">
                            </div>
                            <div class="badge badge-primary my-5 p-3 text-uppercase">500 Orders Completed</div>
                            <div class="gained font-weight-bold">+ 500 ELITE XP Gained !</div>
                        </div>
                    </div>



                    @elseif($totalOrders >= 501 && $totalOrders <= 1000) <div class="card badge-card border-0 py-4 my-4">
                        <div class="card-body text-center">
                            <div class="badge-img">
                                <img src="/imgs/elitegpbadge.png" width="220" alt="">
                            </div>
                            <div class="badge badge-primary my-5 p-3 text-uppercase">50 Orders Completed</div>
                            <div class="gained font-weight-bold">+ 50 ELITE XP Gained !</div>
                        </div>
                </div>

                <div class="card badge-card border-0 py-4 my-4">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">100 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 100 TOP XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-4">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/elitegpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">500 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 500 ELITE XP Gained !</div>
                    </div>
                </div>

                <div class="card badge-card border-0 py-4 my-4">
                    <div class="card-body text-center">
                        <div class="badge-img">
                            <img src="/imgs/topgpbadge.png" width="220" alt="">
                        </div>
                        <div class="badge badge-primary my-5 p-3 text-uppercase">1000 Orders Completed</div>
                        <div class="gained font-weight-bold">+ 1000 TOP XP Gained !</div>
                    </div>
                </div>



                @endif

            </div>


        </div>
    </div>
    @else
    <p>N/A</p>
    @endif



</div>
</div>
</div>
</div>
</div>