<!-- Date of birth Modal start -->
<!-- <button >verification modal</button> -->

<div class="modal fade mt-4" id="dotModal" tabindex="-1" role="dialog" aria-labelledby="dotModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-close-btn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header header-page login-header rounded-top">
                <div class="header-img-modal-login-center custom-set">
                    <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                </div>
            </div>

            <div class="modal-body dot-body">
                <h5 class="text-center mb-4 font-weight-bold">Complete Your Details To Meet Real Friends</h5>
                <div class="row pb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <h6>Nick Name</h6>
                            <input type="text" placeholder="Please enter your nickname" name="name" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <h6>Gender</h6>
                            <div class="newdropdown">
                                <div class="dropdown w-100">
                                    <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                        <div class="game-title" id="drop_down_select">Please select you gender</div>
                                    </a>

                                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                        <div class="scroll-div">
                                            <li role="presentation" class="">
                                                <a role="menuitem" tabindex="-1">
                                                    <div class="">Male</div>
                                                </a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a role="menuitem" tabindex="-1">
                                                    <div class="">Female</div>
                                                </a>
                                            </li>
                                            <li role="presentation" class="">
                                                <a role="menuitem" tabindex="-1">
                                                    <div class="">Other</div>
                                                </a>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <h6>Birthday</h6>

                        <div class="w-100 d-flex align-items-center justify-content-between">
                            <div class="form-group w-100 mr-2">
                                <div class="newdropdown">
                                    <div class="dropdown w-100">
                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                            <div class="game-title" id="drop_down_select">Month</div>
                                        </a>

                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                            <div class="scroll-div">
                                                <li role="presentation" class="active">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Jan</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Feb</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Mar</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Apr</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">May</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Jun</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Jul</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Aug</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Sep</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Oct</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Nov</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">Dec</div>
                                                        <i class="fa fa-check rounded-circle p-1"></i>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-100 mr-2">
                                <div class="newdropdown">
                                    <div class="dropdown w-100">
                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                            <div class="game-title" id="drop_down_select">Date</div>
                                        </a>

                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                            <div class="scroll-div">
                                                <li role="presentation" class="active">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">01</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">02</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">03</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">04</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">05</div>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-100">
                                <div class="newdropdown">
                                    <div class="dropdown w-100">
                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                            <div class="game-title" id="drop_down_select">Year</div>
                                        </a>

                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                            <div class="scroll-div">
                                                <li role="presentation" class="active">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">1991</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">1992</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">1993</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">1994</div>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">1995</div>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 py-2">
                        <h6>Invitation Code (Optional)</h6>
                        <input type="text" placeholder="Please enter your invitation code" name="name" required autocomplete="name" autofocus>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-4 py-2">Complete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Date of birth Modal end -->