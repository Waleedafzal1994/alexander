<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('css/style-services.css?v=') . time() }}" />
<link rel="stylesheet" href="{{ asset('css/style.css?v=') . time() }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<div class="bg-content-clr h-100" id="edit_profile" style="display: none;">
    <div class="edit-profile-page d-flex align-items-center">
        <div class="" style="width:0; max-width:500px; margin-right:20px;"></div>
            <div class="w-100 col-tab-nav">
                <div class="card review-body shadows mb-3">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-custom-nav border-bottom-0" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-edit-profile-tab" data-toggle="pill" href="#pills-edit-profile" role="tab" aria-controls="pills-edit-profile" aria-selected="true">Profile</a>
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
                            <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="block-list-tab" data-bs-toggle="tab" data-bs-target="#block-list" type="button" role="tab" aria-controls="block-list" aria-selected="false" href="#block-list">
                                        Block List
                                    </a>
                                </li>
                            <li class="nav-item ml-auto" role="presentation">
                                <a class="nav-link btn-active" id="pills-back-tab" data-toggle="pill" href="#profile_info" role="tab" aria-controls="profile_info" aria-selected="true"><i class="fa fa-chevon-left"></i> Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab">
                        <div class="bg-white shadows rounded pl-0 pr-3 pb-4 pt-5">
                            <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                <span>Profile</span>
                            </h1>
                            <div class="row mt-4 pl-3" style="padding:15px;">
                                <div class="col-md-12 mb-5">
                                    <form method="POST" enctype="multipart/form-data" id="ajax-profile" action="javascript:void(0)">
                                        <input type="hidden" name="id" value="{{ $service->user->id }}" style="display:none;">
                                        @csrf
                                        @if ($service->user->profile_picture)
                                            <div style="display:Flex; justify-content:center; flex-direction:column;">
                                                <div style="text-align: center;">
                                                    <img src="{{ $service->user->profile_picture }}"
                                                        style="height:128px; width:128px; object-fit:cover; max-width:128px;  border-radius:50%; border:4px solid white;"
                                                        id="profile_picture_img">
                                                    <div>
                                                        <small>Click on the image to change profile photo.</small>
                                                    </div>
                                                    <span class="invalid-feedback" role="alert" id="profile_picture-uploaderror">
                                                        <strong></strong>
                                                    </span>
                                                    <input type="file" name="profile_picture" id="profile_picture"
                                                        style="display:none;">
                                                </div>
                                                <br>
                                                <div style="margin:2px auto;">
                                                    <button class="btn-success py-2 px-3 rounded" id="saveBtn" type="submit"
                                                        style="display:none;">Save</button>
                                                    <a class="btn-danger py-2 px-3 rounded"
                                                        href="/profile/{{ $service->user->id }}/removeAvatar">Remove</a>
                                                </div>

                                            </div>
                                        @else
                                            <div style="display:Flex; justify-content:center; flex-direction:column;">
                                                <div style="text-align: center;">
                                                    <img src="{{ asset('/imgs/avatar.svg') }}"
                                                        style="height:128px; width:128px; object-fit:cover; max-width:128px;  border-radius:50%; border:4px solid white;"
                                                        id="profile_picture_img">
                                                    <div>
                                                        <small>Click on the image to change profile photo.</small>
                                                    </div>
                                                    <input type="file" name="profile_picture" id="profile_picture"
                                                        style="display:none;">
                                                </div>
                                                <br>
                                                <div style="margin:2px auto;">
                                                    <button class="btn-success py-2 px-3 rounded" type="submit" id="saveBtn"
                                                        style="display:none;">Save</button>
                                                </div>

                                            </div>
                                        @endif
                                    </form>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <form method="POST" id="ajax_edit_profile" action="/profile/{{ $service->user->id }}/edit">
                                        @csrf
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        {{-- Form Element --}}
                                        <div class="form-group">
                                            <label for="">Nickname</label>
                                            <input type="text" name="name" class="form-control border-input" value="{{ $service->user->name }}" minlength="3" maxlength="30">
                                        </div>
                                        {{-- Form Element --}}
                                       @if($service->user->seller_rank == 0 && $service->user->usaer_group == 3)
                                        @php $user_rank = 'admin' @endphp
                                       @elseif($service->user->seller_rank == 0)
                                        @php $user_rank = 'user' @endphp
                                       @else
                                        @php $user_rank = 'seller' @endphp
                                       @endif
                                        <div class="form-group">
                                            <label for="">Member Status</label>
                                            <!-- <input type="text" name="title" class="form-control"
                                            value="{{ $user_rank }}" disabled> -->
                                            @if($user_rank == 'user')
                                            <div class="skew-bg-users">GamersPlay</div>
                                            @else
                                            <div class="skew-bg-users">GamersPlay+</div>
                                            @endif
                                            <input type="hidden" name="title" value="{{ $user_rank }}">
                                        </div>
                                        {{-- Form Element --}}
                                        <input class="gender_hidden" type="hidden" name="gender">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <div class="w-100 custom-dropdown">
                                                <div class="form-group w-100 mb-0 mr-2">
                                                    <div class="newdropdown">
                                                        <div class="dropdown w-100">
                                                            <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                                <div class="game-title drop_down_select_gender" id="drop_down_select_gender">Please select your gender</div>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown_month" role="menu" aria-labelledby="drop1" id="month_ul">
                                                                <div class="scroll-div gender">
                                                                    <li role="presentation" id="month_li_jan" data-month="Jan">
                                                                        <a role="menuitem" tabindex="-1">
                                                                            <div class="month_name">Male</div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                        </a>
                                                                    </li>
                                                                    <li role="presentation" class="" id="month_li_feb">
                                                                        <a role="menuitem" tabindex="-1">
                                                                            <div class="month_name">Female</div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                        </a>
                                                                    </li>
                                                                    <li role="presentation" class="" id="month_li_mar">
                                                                        <a role="menuitem" tabindex="-1">
                                                                            <div class="" data-setMonth="Mar">Non-Binary</div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                        </a>
                                                                    </li>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
                                        <div class="form-group">
                                            <label>Language</label>
                                                <select id="choices-multiple-remove-button" placeholder="Select languages" name="primary_language[]" multiple>
                                                    <?php if(!empty($service->user->primary_language)): 
                                                        $pl = explode(',', $service->user->primary_language);
                                                    ?>
                                                        
                                                    <?php endif;?>

                                                    <option value="English" <?= (in_array("English", $pl) == '1') ? 'selected' : '';?> > English</option>
                                                    <option value="Afrikaans" <?= (in_array("Afrikaans", $pl) == '1') ? 'selected' : '';?> >Afrikaans</option>
                                                    <option value="Albanian" <?= (in_array("Albanian", $pl) == '1') ? 'selected' : '';?> >Albanian</option>
                                                    <option value="Armenian" <?= (in_array("Armenian", $pl) == '1') ? 'selected' : '';?> >Armenian</option>
                                                    <option value="Arabic" <?= (in_array("Arabic", $pl) == '1') ? 'selected' : '';?> >Arabic</option>
                                                    <option value="Basque" <?= (in_array("Basque", $pl) == '1') ? 'selected' : '';?> >Basque</option>
                                                    <option value="Bosnian" <?= (in_array("Bosnian", $pl) == '1') ? 'selected' : '';?> >Bosnian</option>
                                                    <option value="Bengali" <?= (in_array("Bengali", $pl) == '1') ? 'selected' : '';?> >Bengali</option>
                                                    <option value="Bulgarian" <?= (in_array("Bulgarian", $pl) == '1') ? 'selected' : '';?> >Bulgarian</option>
                                                    <option value="Catalan" <?= (in_array("Catalan", $pl) == '1') ? 'selected' : '';?> >Catalan</option>
                                                    <option value="Cambodian" <?= (in_array("Cambodian", $pl) == '1') ? 'selected' : '';?> >Cambodian</option>
                                                    <option value="Czech" <?= (in_array("Czech", $pl) == '1') ? 'selected' : '';?> >Czech</option>
                                                    <option value="Spanish" <?= (in_array("Spanish", $pl) == '1') ? 'selected' : '';?> >Spanish</option>
                                                </select> 
                                        </div>

                                        <script>
                                            $(document).ready(function(){
                        
                                                var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                                                removeItemButton: true,
                                                placeholder: true,
                                                resetScrollPosition: true,
                                                maxItemCount:2,
                                                // searchResultLimit:5,
                                                // renderChoiceLimit:5
                                                });
                                            });
    
                                        </script>

                                    <!-- </form> -->
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="real_name" class="form-control border-input" value="{{ $service->user->real_name }}" minlength="3" maxlength="30">
                                    </div>

                                    <input class="country_hidden" type="hidden" name="">
                                    <!-- {{-- Form Element --}} -->
                                    <div class="form-group">
                                        <label for="">Country</label>
                                        @if(!empty($service->user->country))
                                        <input type="text" name="country" value="{{ getCountryFullName($service->user->country) }}" class="form-control border-input" disabled/>
                                        @else
                                        <input type="text" name="country" value="N/A" class="form-control border-input" disabled/>
                                        @endif   
                                    </div>
                                    <input class="month_hidden" type="hidden" name="month">
                                    <input class="date_hidden" type="hidden" name="day">
                                    <input class="year_hidden" type="hidden" name="year">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <div class="w-100 d-flex align-items-center justify-content-between dob-dropdown">
                                            <div class="form-group w-100 mb-0 mr-2">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title drop_down_select_month" id="drop_down_select_month">Month</div>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown_month" role="menu" aria-labelledby="drop1" id="month_ul">
                                                            <div class="scroll-div month">
                                                                <li role="presentation"  id="month_li_jan" data-month="Jan">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="month_name">Jan</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_feb">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="month_name">Feb</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_mar">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="" data-setMonth="Mar">Mar</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_apr">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Apr</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_may">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">May</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_jun">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Jun</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_jul">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Jul</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_aug">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Aug</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_sep">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Sep</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_oct">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Oct</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_nov">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Nov</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                <li role="presentation" class="" id="month_li_dec">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">Dec</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group w-100 mb-0 mr-2">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title drop_down_select_date" id="drop_down_select_date">Date</div>
                                                        </a>

                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                            <div class="scroll-div date">
                                                                @for($d = 01; $d<=31; $d++)
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div class="">{{$d}}</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                @endfor
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group w-100 mb-0">
                                                <div class="newdropdown">
                                                    <div class="dropdown w-100">
                                                        <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                            <div class="game-title drop_down_select_year" id="drop_down_select_year">Year</div>
                                                        </a>

                                                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                                            <div class="scroll-div year">
                                                                @for($i = 1950; $i<= date('Y'); $i++)
                                                                <li role="presentation" class="">
                                                                    <a role="menuitem" tabindex="-1">
                                                                        <div id="year">{{$i}}</div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z" fill="#fff"/></svg>
                                                                    </a>
                                                                </li>
                                                                @endfor
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <!-- <div class="form-group">
                                        <label for="">Country</label>
                                        <select name="country" class="form-control">
                                            <option value="N/A">N/A</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div> -->
                                    {{-- Form Element --}}
                                    <div class="form-group">
                                        <label for="">About Me</label>
                                        <div class="textArea-body" id="focus_textarea">
                                            <textarea type="text" id="field" name="description" class="textarea" onkeyup="countCount(this)" oninput="auto_grow(this)"
                                                rows="3">{{ $service->user->description }}</textarea>
                                                <div class="text-counter">
                                                    <span id="charCounting" class="counter">0</span>
                                                    <span class="fix-count">/500</span>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded shadows pl-0 pr-3 pb-4 pt-5 mt-4">
                            <div class="" style="margin-bottom:10px;">
                                <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                    <span>Socials</span>
                                </h1>
                            </div>
                            <div class="row mt-4 pl-3" style="padding:15px">
                                <div class="col-md-4">
                                    <br>
                                    <label for="">Facebook</label>
                                    <input type="url" name="facebook_profile" class="input border-input" style="margin-bottom:10px;"
                                        placeholder="facebook.com/gamersplay" value="{{ $service->user->facebook_profile }}">
                                    <label for="">Twitch</label>
                                    <input type="url" name="twitch_profile" class="input border-input"
                                        placeholder="twitch.tv/gamersplay" value="{{ $service->user->twitch_profile }}">
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <label for="">Instagram</label>
                                    <input type="url" name="instagram_profile" class="input border-input" style="margin-bottom:10px;" placeholder="@gamersplay"
                                        value="{{ $service->user->instagram_profile }}">
                                    <label for="">Tiktok</label>
                                    <input type="url" name="tiktok_profile" class="input border-input" placeholder="tiktok.com/gamersplay" value="{{ $service->user->tiktok_profile }}">
                                </div>
            
                                <div class="col-md-12 mt-4">
                                    <div class="d-flex justify-content-center">
                                        <ul class="nav nav-custom-nav">
                                            <li>
                                                <button type="submit" class="new-btn rounded-pill font-weight-bold btn-actives save_btn_hover text-white px-4 py-2" id="edit_profile_btn" value="Save">Save</button>
                                            </li>
                                        </ul>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                    <div class="tab-pane fade" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
                        <div class="bg-white shadows rounded pl-0 pr-3 pb-4 pt-5">
                            <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                <span>Account</span>
                            </h1>
                            <form action="" class="mt-4 pl-3">
                                <p class="mb-4">Account Information</p>
                                <ul class="account-information pb-3">
                                    <li class="d-flex align-items-center">
                                        <div>ID:</div> 
                                        <p>{{ str_pad($service->user->id, 5, '0', STR_PAD_LEFT) }}</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div>Registration Time:</div> 
                                        <p>Jul 20, 2022</p>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <div>Account:</div> 
                                        <p>tehswarm@gmail.com</p>
                                    </li>
                                    <!-- <li class="d-flex align-items-center">
                                        <div>Phone:</div> 
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p>No phone number bound</p>
                                            <div>
                                                <button type="button" data-toggle="modal" data-target="#bindModal" class="new-btn rounded-pill py-2 px-3 float-none">Bind</button>
                                                <a type="button" class="ml-4 rounded-circle px-2 position-relative" data-tooltip title="The bound phone number is used to log in or receive order and other messages">?</a>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li class="d-flex align-items-center">
                                        <div>Password:</div> 
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p>********</p>
                                            <div>
                                                <button type="button" data-toggle="modal" data-target="#passwordChangeModal" class="btn-solid rounded-pill py-2 px-3 float-none btn-actives save_btn_hover">Change</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <div class="delete-accnt pt-3 d-flex align-items-center">
                                    <p>Delete Account</p>
                                    <a type="button" data-toggle="modal" data-target="#deleteModal">Delete</a>
                                </div>
                            </form>
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-custom-nav">
                                    <li>
                                        <button type="submit" class="new-btn rounded-pill font-weight-bold btn-actives save_btn_hover text-white px-4 py-2" id="edit_profile_btn" value="Save">Save</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                        <div class="bg-white shadows rounded pl-0 pr-3 pb-4 pt-5">
                            <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                <span>Notifications</span>
                            </h1>
                            <form action="" class="mt-4 pl-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>E-mail Subscriptions:</h6>
                                            <p class="mb-0">Subscribe to receive order notifications, news, major updates and promotional events.</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>GamersPlay+ Recommendation:</h6>
                                            <p class="mb-0">Receive GamersPlay+ recommended by the platform.</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Sound</h6>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Order</h6>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>IM Message</h6>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-custom-nav">
                                    <li>
                                        <button type="submit" class="new-btn rounded-pill font-weight-bold btn-actives save_btn_hover text-white px-4 py-2" id="edit_profile_btn" value="Save">Save</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-privacy" role="tabpanel" aria-labelledby="pills-privacy-tab">
                        <div class="bg-white shadows rounded pl-0 pr-3 pb-4 pt-5">
                            <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                <span>Privacy Settings</span>
                            </h1>
                            <form action="" class="mt-4 pl-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Hide Birthday:</h6>
                                            <p class="mb-0">Activate to stop other users from seeing your birthday.</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Anonymous on Leaderboard:</h6>
                                            <p class="mb-0">When activated, you’ll not be shown on the Client leaderboard.</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Turn Off Suggestions:</h6>
                                            <p class="mb-0">When activated, the system won’t suggest you to anyone.</p>
                                        </div>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                                <!-- <hr>
                                <div class="form-group">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="mr-4">
                                            <h6>Block List:</h6>
                                            <p class="mb-0">You can manage the blocked users here, such as removing them from the list.</p>
                                        </div>
                                        <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-4 py-2">Expand</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-custom-nav">
                                    <li>
                                        <button type="submit" class="new-btn rounded-pill font-weight-bold btn-actives save_btn_hover text-white px-4 py-2" id="edit_profile_btn" value="Save">Save</button>
                                    </li>
                                </ul>
                            </div>
                        </div>    
                    </div>
                    <div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-s-tab">
                        <div class="bg-white shadows rounded pl-0 pr-3 pb-4 pt-5">
                            <h1 id="categoryName" class="d-inline-block skew-bg py-4 mr-5">
                                <span>Auto Reply</span>
                            </h1>
                            <form action="" class="mt-4 pl-3">
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span class="online mr-1"></span> Online
                                        </h6>
                                        <p class="mb-0">No auto reply yet</p>
                                    </div>
                                    <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient btn-actives text-white px-4 py-2">Edit</button>
                                </div>
                                <!-- <hr> -->
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span class="online offline mr-1"></span> Online
                                        </h6>
                                        <p class="mb-0">No auto reply yet</p>
                                    </div>
                                    <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient btn-actives text-white px-4 py-2">Edit</button>
                                </div>
                                <!-- <hr> -->
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span class="online in-order mr-1"></span> Online
                                        </h6>
                                        <p class="mb-0">No auto reply yet</p>
                                    </div>
                                    <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient btn-actives text-white px-4 py-2">Edit</button>
                                </div>
                                <!-- <hr> -->
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="mb-0 d-flex align-items-center">
                                            <span class="online resting mr-1"></span> Online
                                        </h6>
                                        <p class="mb-0">No auto reply yet</p>
                                    </div>
                                    <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient btn-actives text-white px-4 py-2">Edit</button>
                                </div>
                                <!-- <hr> -->
                            </form>
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-custom-nav">
                                    <li>
                                        <!-- <button type="submit" class="new-btn rounded-pill font-weight-bold btn-actives save_btn_hover text-white px-4 py-2" id="edit_profile_btn" value="Save">Save</button> -->

                                        <input type="submit" class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-4 py-2" id="edit_profile_btn" value="Save">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <!-- START: Block List -->
                    <div class="tab-pane fade block-list-result shadows rounded" id="block-list" role="tabpanel" aria-labelledby="block-list-tab">
                        @include('services.blockList')
                    </div>
                    <!-- END: Block List -->
                </div>
            </div>
    </div>
</div>

<!--Bind Modal -->
<div class="modal fade" id="bindModal" tabindex="-1" aria-labelledby="bindModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bindModalLabel">Bind Number</h5>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-close-btn" style="margin-bottom: -6px !important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header header-page login-header rounded-top">
                <div class="header-img-modal-login-center custom-set">
                    <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                </div>
            </div>
            <div class="modal-body">
                <form action="/user/is_delete" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{Auth::id()}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group number-change">
                                <p class="small-text">
                                    Deleting your account will remove all of your income and balance. 
                                    If you have subscribed to VIP, you need to cancel it through your payment methods.
                                </p>
                                <p class="small-text">
                                    ARE YOU SURE YOU WANT TO DELETE YOUR ACCOUNT?
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer model-footer-bg">
                <div class="text-end delete-accnt">
                    <a href="" class="mr-3" data-dismiss="modal" aria-label="Close">Cancel</a>
                    <button type="submit" class="btn-danger rounded-pill text-white px-3 py-1" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<!-- Modal -->
<div class="modal fade" id="passwordChangeModal" tabindex="-1" aria-labelledby="passwordChangeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content change-password">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="passwordChangeModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-close-btn" style="margin-bottom: -6px !important;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-header header-page login-header rounded-top">
                <div class="header-img-modal-login-center custom-set">
                    <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                </div>
            </div>
            <form method="POST" id="change_password" action="/profile/{{ $service->user->id }}/edit">
            <div class="modal-body">
                <!-- <h5 class="modal-title" id="passwordChangeModalLabel">Change Password</h5> -->
                
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group position-relative mb-3 pb-1">
                                <label>Old Password*</label>
                                <input id="password-reg" class="border-input" type="password" name="current_password" maxlength="15" placeholder="Please enter your current password" required autocomplete="new-password">
                                <span class="password-showhide-change">
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
                                <label>New Password*</label>
                                <input id="password-confirm-reg" class="border-input" type="password" name="new_password" maxlength="15" placeholder="Please enter your password" required autocomplete="new-cnf-password">

                                <span class="password-showhide-change">
                                    <span class="show-password">Show</span>
                                    <span class="hide-password">Hide</span>
                                </span>
                            </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer model-footer-bg">
                <div class="text-end delete-accnt">
                    <a href="" class="mr-3" data-dismiss="modal" aria-label="Close">Cancel</a>
                    <button type="submit" class="btn-danger rounded-pill text-white px-3 py-1 update-submit" >Change</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- This commented -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- End here -->

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
   $(document).ready(function() {

    
    // field
    const length_textarea = document.getElementById("field").value.length;

    console.log(length_textarea,'Value')
    $('#charCounting').text(length_textarea);
    });
    var profilePicChanged = false;
        $(document).ready(function() {
            @if ($service->user->country)
                $('select[name="country"]').val('{{ $service->user->country }}');
            @endif
            @if ($service->user->gender)
                $('input[name="gender"]').val('{{ $service->user->gender }}');
            @endif
            @if ($service->user->primary_language)
            // var 
                $('select[name="primary_language"]').val('{{ $service->user->primary_language }}');
            @endif
            @if ($service->user->secondary_language)
                $('select[name="secondary_language"]').val('{{ $service->user->secondary_language }}');
            @endif
        });
    $("#pills-back-tab").click(function(){
        
        document.getElementById("profileBar_info").style.display = "block";
        $('#services_navbar').addClass('show-on-unblock');
        // document.getElementById("services_navbar").style.display = "block";
        document.getElementById("edit_profile").style.display = "none";

        $("#edit_user_profile").removeClass('show active'); 
        $("#pills-edit-profile-tab").removeClass('active');
        $("#pills-back-tab").removeClass('active');

        $("#home-tab").addClass('active');
        $("#home").addClass('active show');

        localStorage.removeItem("edit_seller_profile");
        document.getElementById("home-tab").click();

    });
    $('#profile_picture_img').click(function(e) {
            e.preventDefault();
            $('#profile_picture').trigger('click');
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile_picture_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_picture").change(function() {
            readURL(this);
            profilePicChanged = true;
            $('#saveBtn').show();
        });


        $('#ajax-profile').submit(function(e) {
            e.preventDefault();
            $(".invalid-feedback").children("strong").text("");
            $(".is-invalid").removeClass("is-invalid");
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "/profile/{{ $service->user->id }}/editAvatar",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    //window.location.reload();
                    alertify.success('Profile Image Update Successfully.');
                },
                error: function(response) {

                    // console.log("error1", response);
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        console.log(errors);
                        alertify.error(errors.profile_picture[0]);
                        Object.keys(errors).forEach(function(key) {
                            $("#" + key + "-uploaderror").addClass(
                                "is-invalid d-block");
                            $("#" + key + "-uploaderror").children(
                                "strong").text(errors[key][0]);
                        });
                    } else if (response.status === 500) {
                        $("#profile_picture-uploaderror").addClass(
                            "is-invalid d-block").children(
                            "strong").text(errors[key][0]);
                    } else {
                        //alertify.success('Profile Image Update Successfully.');
                        window.location.reload();
                    }
                }
            });
        });
        @if (\Session::has('success'))
            Swal.fire('Success','{{ \Session::get('success') }}','success');
            {{ \Session::forget('success') }}
        @endif
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

    // Textarea
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    };

    $('.textarea').focus(function() { 
        $(this).parent().removeClass("inputFocus");
        $(this).parent().addClass("inputFocus");
    }).blur(function(){
        $(this).parent().removeClass("inputFocus");
    }); 


    // Age DropDowns
    
    $(document).ready(function() {
        
        @if ($service->user->gender)
        var gender = '<?= $service->user->gender; ?>';
            $('.drop_down_select_gender').text(gender) ;
            $('.scroll-div.gender').find('li:contains('+gender+')').addClass('active');
        @endif

        @if ($service->user->birth_date)
            var birth_date = '<?= $service->user->birth_date; ?>';
            var day = '<?= date('d',strtotime($service->user->birth_date)); ?>';
            var month = '<?= date('M',strtotime($service->user->birth_date)); ?>';
            var year = '<?= date('Y',strtotime($service->user->birth_date)); ?>';
            //alert(birth_date+'-'+day+'-'+month+'-'+year);
            $('.drop_down_select_month').text(month) ;
            $('.scroll-div.month').find('li:contains('+month+')').addClass('active');
            $('.month_hidden').val(month);

            $('.drop_down_select_date').text(day) ;
            $('.scroll-div.date').find('li:contains('+day+')').addClass('active');
            $('.date_hidden').val(day);

            $('.drop_down_select_year').text(year) ;
            $('.scroll-div.year').find('li:contains('+year+')').addClass('active');
            $('.year_hidden').val(year);
        @endif

        @if ($service->user->country)
            var country = '<?= $service->user->country; ?>';
            $('.drop_down_select_country').text(country) ;
            $('.scroll-div.country').find('li:contains('+country+')').addClass('active');
        @endif  

       $('.scroll-div li a').click(function(){
            if($(this).parents('.scroll-div').hasClass('month')){
        
                
                $(this).parents('.month').find('li').removeClass('active');  
                var month = $.trim($(this).text());

                $('.drop_down_select_month').text(month) ;
                // var parent = $(this).parents('.month').find('li.active a div.month_name').text();

                $('.month_hidden').val(month);
            }
            else if($(this).parents('.scroll-div').hasClass('date')){
              $(this).parents('.date').find('li').removeClass('active');  

              var date = $.trim($(this).text());
              $('.drop_down_select_date').text(date) ;
              // document.getElementById('drop_down_select_date').innerText = date;
              $('.date_hidden').val(date);
            }
            else if($(this).parents('.scroll-div').hasClass('year')){
              $(this).parents('.year').find('li').removeClass('active');  

              var year = $.trim($(this).text());
              $('.drop_down_select_year').text(year) ;
              // document.getElementsByClassName('drop_down_select_year').innerText = year;
              $('.year_hidden').val(year);
            }
            else if($(this).parents('.scroll-div').hasClass('country')){

              $(this).parents('.country').find('li').removeClass('active');  

              var country = $.trim($(this).text());
        
              $('.drop_down_select_country').text(country) ;
              
              $('.country_hidden').val(country);
            }
            else if($(this).parents('.scroll-div').hasClass('gender')){

              $(this).parents('.gender').find('li').removeClass('active');  

              var gender = $.trim($(this).text());
        
              $('.drop_down_select_gender').text(gender) ;
              
              $('.gender_hidden').val(gender);
            }
            else if($(this).parents('.scroll-div').hasClass('language')){

              $(this).parents('.language').find('li').removeClass('active');  

              var language = $.trim($(this).text());
        
              $('.drop_down_select_language').text(language) ;
              
              $('.language_hidden').val(gender);
            }

            
            
            $(this).parent('li').addClass('active');
        });

       $('#ajax_edit_profile').submit(function(e) {
        // alert();
            e.preventDefault();

            // var month = $('.month_hidden').val();
            // var date = $('.date_hidden').val();
            // var year = $('.year_hidden').val();
            // var month = $('.month_hidden').val();
            // var date = $('.date_hidden').val();
            // var year = $('.year_hidden').val();
            // if(month =='' && date =='' && year ==''){
            //     $('.complete-error').show();
            //     $('.completeBtn').attr('disabled',true);
            // }
            // else{
            //     $('.complete-error').hide();
            //      $('.completeBtn').attr('disabled',false);
            // }
            let formData = $(this).serializeArray();
            $.ajax({
                type: "POST",
                url: "/profile/{{ $service->user->id }}/edit",
                headers: {
                    Accept: "application/json"
                },
                dataType:"JSON",
                data: formData,
                beforeSend: function() {
                    
                    $('#edit_profile_btn').text('Processing');
                },
                complete: function() {
                    $('#edit_profile_btn').text('Save');
                },
                success: (response) => {

                    if(response === 0){

                        alertify.error('The age cannot be less than 13 years old');
                    }
                    else if(response === 1){
                        
                        alertify.success('Profile has been updated.');
                    }
                    else{

                        if(typeof response =='object'){
                            $.each(response,function(index,value){
                                
                                // console.log(value);
                                alertify.error(value[0]);
                             });
                        }
                        else{

                            alertify.error('Try again later');
                        }
                        
                        
                        return false;
                    } 
                   

                },
                error: (response) => {
                    // alert();
                }
            })
        });
 
    });

    function countCount(val) {
        console.log("Hello");
        var len = val.value.length;
        if (len >= 500) {
            val.value = val.value.substring(0, 500);
        } else {
            $('#charCounting').text(len);
        };
    };

    //by umar
    $('#change_password').submit(function(e) {
            e.preventDefault();
            
            let formData = $(this).serializeArray();
            $.ajax({
                type: "POST",
                url: "/profile/{{ $service->user->id }}/updateUserPass",
                headers: {
                    Accept: "application/json"
                },
                dataType:"JSON",
                data: formData,
                beforeSend: function() {
                    
                    $('#update-submit').text('Processing');
                },
                complete: function() {
                    $('#update-submit').text('Change');
                },
                success: (response) => {
                 
                    if (response.success==true) 
                    {
                        alertify.success(response.message);
                        //$('#passwordChangeModal').modal('toggle');
                    }
                    else if(response.success==false){

                        alertify.error(response.message);
                    }
                    else
                    {
                        if(typeof response =='object'){
                            $.each(response,function(index,value){
                                
                                // console.log(value);
                                alertify.error(value[0]);
                             });
                        }
                        else{

                            alertify.error('Try again later');
                        }
                        
                        
                        return false;
                    }
                },
                error: (response) => {
                    // alert();
                }
            })
        });

</script>