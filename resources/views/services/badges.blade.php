<div class="card mt-2 p-0">
    <div class="card-body">
        <div class="service-main-body-content">
            <div class="row">
                <div class="col-sm-12">
                    @if($totalOrders >= 0 && $totalOrders <=50) <div class="post-box">
                        <div class="central-meta item post-item-box" style="display: inline-block;" id="post-item-box-1">
                            <div class="user-post">
                                <div class="friend-info">

                                    <figure>
                                        <img src="{{asset('imgs/icons/rankings.png')}}" alt="">
                                    </figure>
                                    <div class="friend-name">

                                        <ins>
                                            <a href="javascript:void(0);" title="">Silver</a>
                                        </ins>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                @endif
                @if($totalOrders >= 51 && $totalOrders <= 100) <div class="post-box">
                    <div class="central-meta item post-item-box" style="display: inline-block;" id="post-item-box-1">
                        <div class="user-post">
                            <div class="friend-info">

                                <figure>
                                    <img src="{{asset('imgs/icons/rankings.png')}}" alt="">
                                </figure>
                                <div class="friend-name">

                                    <ins>
                                        <a href="javascript:void(0);" title="">Gold</a>
                                    </ins>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            @endif

        </div>
    </div>
</div>
</div>
</div>