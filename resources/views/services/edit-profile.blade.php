<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('css/style-services.css?v=') . time() }}" />
<link rel="stylesheet" href="{{ asset('css/style.css?v=') . time() }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

@section('content')

<div class="bg-content-clr h-100">
    <div class="container edit-profile-page">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-tab-nav mt-5">
                <ul class="nav nav-tabs nav-custom-nav mb-3 pb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-edit-profile-tab" data-toggle="pill" href="#pills-edit-profile" role="tab" aria-controls="pills-edit-profile" aria-selected="true">Edit Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-account-tab" data-toggle="pill" href="#pills-account" role="tab" aria-controls="pills-account" aria-selected="false">Account</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-notification-tab" data-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false">Notifications</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-privacy-tab" data-toggle="pill" href="#pills-privacy" role="tab" aria-controls="pills-privacy" aria-selected="false">Privacy</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">IM Settings</a>
                    </li>
                </ul>
                <div class="tab-content bg-white rounded p-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab">
                        <form action="">
                            <h3 class="my-3">Profile Information</h3>
                            <div class="form-group mb-4">
                                <label for="">Name</label>
                                <input type="text" class="form-control" placeholder="Please enter your name">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Time Zone</label>
                                <div class="newdropdown">
                                    <div class="dropdown w-100">
                                        <a id="drop1" href="#" class="dropdown-toggle text-decoration-none d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                            <div class="game-title" id="drop_down_select_month">Time Zone</div>
                                        </a>

                                        <ul class="dropdown-menu dropdown_month" role="menu" aria-labelledby="drop1" id="month_ul">
                                            <div class="scroll-div month">
                                            <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-11:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-10:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-09:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-08:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-07:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-06:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-05:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-04:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="active" id="month_li_jan" data-month="Jan">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-03:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_feb">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="month_name">GMT-02:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_mar">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="" data-setMonth="Mar">GMT-01:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_apr">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+00:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_may">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+01:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_jun">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+02:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_jul">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+03:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_aug">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+04:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_sep">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+05:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_oct">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+06:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_nov">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+07:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_dec">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+08:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_dec">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+09:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_dec">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+10:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="" id="month_li_dec">
                                                    <a role="menuitem" tabindex="-1">
                                                        <div class="">GMT+11:00</div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                    </a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Language</label>
                                <input type="text" class="form-control" placeholder="Please select your language">
                            </div>
                            <div class="form-group mb-4 text-box">
                                <label for="">Bio</label>
                                <textarea type="text" name="the-textarea" rows="4" id="the-textarea" maxlength="300" class="form-control" row="6" placeholder="Write a short bio to introduce yourself"></textarea>
                                <div id="the-count">
                                    <span id="current">0</span>
                                    <span id="maximum">/ 300</span>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="new-btn rounded-pill py-2 px-4 float-none">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                        <form action="">
                            <h2 class="mb-5">Account</h2>
                            <p class="mb-4">Account Information</p>
                            <ul class="account-information pb-3">
                                <li class="d-flex align-items-center">
                                    <div>ID:</div> 
                                    <p>1521932024</p>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div>Registration Time:</div> 
                                    <p>Jul 20, 2022</p>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div>Account:</div> 
                                    <p>tehswarm@gmail.com</p>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div>Phone:</div> 
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p>No phone number bound</p>
                                        <div>
                                            <button type="button" data-toggle="modal" data-target="#bindModal" class="new-btn rounded-pill py-2 px-3 float-none">Bind</button>
                                            <a type="button" class="ml-4 rounded-circle px-2 position-relative" data-tooltip title="The bound phone number is used to log in or receive order and other messages">?</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div>ID:</div> 
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p>1521932024</p>
                                        <div>
                                            <button type="button" data-toggle="modal" data-target="#passwordChangeModal" class="new-btn rounded-pill py-2 px-3 float-none">Change</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr>
                            <div class="delete-accnt pt-3 d-flex align-items-center">
                                <p>Delete Account</p>
                                <a href="">Delete</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                        <form action="">
                            <div class="form-group">
                                <h3 class="my-3">Notifications</h3>
                                <div class="form-group mb-4 d-flex align-items-center justify-content-between">
                                    <div class="mr-4">
                                        <h6>E-mail Subscriptions:</h6>
                                        <p class="mb-0">Subscribe to receive order notifications, news, major updates and promotional events.</p>
                                    </div>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="form-group mb-4 d-flex align-items-center justify-content-between">
                                    <div class="mr-4">
                                        <h6>ePal Recommendation:</h6>
                                        <p class="mb-0">Receive ePals recommended by the platform.</p>
                                    </div>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="form-group mb-4 d-flex align-items-center justify-content-between">
                                    <div class="mr-4">
                                        <h6>Sound</h6>
                                    </div>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group mb-4 d-flex align-items-center justify-content-between">
                                    <div class="mr-4">
                                        <h6>Order</h6>
                                    </div>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group mb-4 d-flex align-items-center justify-content-between">
                                    <div class="mr-4">
                                        <h6>IM Message</h6>
                                    </div>
                                    <div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-privacy" role="tabpanel" aria-labelledby="pills-privacy-tab">Privacy</div>
                    <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">Settings</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Bind Modal -->
<div class="modal fade" id="bindModal" tabindex="-1" aria-labelledby="bindModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bindModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group number-change">
                                <h6>Phone Number</h6>
                                <div class="d-flex">
                                    <select name="" id="" class="form-control mr-4">
                                        <option value="1" selected>+1</option>
                                        <option value="2">+2</option>
                                        <option value="3">+3</option>
                                        <option value="4">+4</option>
                                    </select>
                                    <input type="number" name="number" placeholder="Please enter your phone number" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4 mx-auto">
                        <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-5 py-2">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<!-- Modal -->
<div class="modal fade" id="passwordChangeModal" tabindex="-1" aria-labelledby="passwordChangeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordChangeModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group position-relative mb-3 pb-1">
                                <h6>Old Password*</h6>
                                <input id="password-reg" type="password" name="password" maxlength="15" placeholder="Please enter your current password" required autocomplete="new-password">
                                <span class="password-showhide">
                                    <span class="show-password">Show</span>
                                    <span class="hide-password">Hide</span>
                                </span>
                                <div class="password-reg-error-msg pt-3">
                                    <span class="invalid-feedback" role="alert" id="password-reg-error">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group position-relative">
                                <h6>New Password*</h6>
                                <input id="password-confirm-reg" type="password" name="password_confirmation" maxlength="15" placeholder="Please enter your password" required autocomplete="new-cnf-password">

                                <span class="password-showhide">
                                    <span class="show-password">Show</span>
                                    <span class="hide-password">Hide</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4 mx-auto">
                        <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-5 py-2">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('textarea').keyup(function() {
        
        var characterCount = $(this).val().length,
            current = $('#current'),
            maximum = $('#maximum'),
            theCount = $('#the-count');
        
        current.text(characterCount);
    
        /*This isn't entirely necessary, just playin around*/
        if (characterCount < 70) {
            current.css('color', '#666');
        }
        if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
        }
        if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
        }
        if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
        }
        if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
        }
        
        if (characterCount >= 140) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight','bold');
        } else {
            maximum.css('color','#666');
            theCount.css('font-weight','normal');
        }
        
    });

    $(".show-password, .hide-password").on('click', function() {
        var passwordId = $(this).parents('.form-group').find('input').attr('id');
        if ($(this).hasClass('show-password')) {
            $("#" + passwordId).attr("type", "text");
            $(this).parent().find(".show-password").hide();
            $(this).parent().find(".hide-password").show();
        } else {
            $("#" + passwordId).attr("type", "password");
            $(this).parent().find(".hide-password").hide();
            $(this).parent().find(".show-password").show();
        }
    });
</script>