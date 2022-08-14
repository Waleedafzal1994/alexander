<!-- Date of birth Modal start -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" >verification modal</button> -->
<style type="text/css">
    .complete-error{
        display: none;
    }
    .complete-error p{
        color: red;
    }
</style>
<div class="modal fade mt-4" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-close-btn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->
            <div class="modal-header header-page login-header rounded-top">
                <div class="header-img-modal-login-center custom-set">
                    <img class="img-modal-login-center" src="{{ asset('temp-services/images/newv3.png') }}">
                </div>
            </div>

            <div class="modal-body dot-body">
                <h5 class="text-center mb-4 font-weight-bold">Complete your details to meet new gamer friends!</h5>
                <form method="POST" id="profileFormModal">
                    @csrf
                    <div class="row pb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <h6>Nick Name</h6>
                                <input type="text" id="nickName" placeholder="Please enter your nickname" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <h6>Gender</h6>
                                <!-- <div class="newdropdown">
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
                                </div> -->
                                <select name="gender" id="gender" required="">
                                    <option value="" selected="" disabled="">Please select you gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="NON-BINARY">NON-BINARY</option>
                                </select>
                            </div>
                        </div>
                        
                        <input class="month_hidden" type="hidden" name="month">
                        <input class="date_hidden" type="hidden" name="day">
                        <input class="year_hidden" type="hidden" name="year">
                        <div class="col-12">
                            <h6>Birthday</h6>
                            <!-- <select name="month" id="month" required="" class="col-4">
                                <option value="" selected="" disabled="">Month</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <select name="day" id="date" required="" class="col-4">
                                <option value="" selected="" disabled="">Date</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select name="year" id="year" required="" class="col-3">
                                <option value="" selected="" disabled="">Year</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                            </select> -->

                            <div class="w-100 d-flex align-items-center justify-content-between dob-dropdown">
                                <div class="form-group w-100 mr-2">
                                    <div class="newdropdown">
                                        <div class="dropdown w-100">
                                            <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                <div class="game-title" id="drop_down_select_month">Month</div>
                                            </a>

                                            <ul class="dropdown-menu dropdown_month" role="menu" aria-labelledby="drop1" id="month_ul">
                                                <div class="scroll-div month">
                                                    <li role="presentation" class="active" id="month_li_jan" data-month="Jan">
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
                                <div class="form-group w-100 mr-2">
                                    <div class="newdropdown">
                                        <div class="dropdown w-100">
                                            <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                <div class="game-title" id="drop_down_select_date">Date</div>
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
                                <div class="form-group w-100">
                                    <div class="newdropdown">
                                        <div class="dropdown w-100">
                                            <a id="drop1" href="#" class="dropdown-toggle d-flex align-items-center justify-content-between" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                                <div class="game-title" id="drop_down_select_year">Year</div>
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

                        <div class="col-12 py-2">
                            <h6>Invitation Code (Optional) <span><a type="button" class="rounded-circle px-1" data-tooltip title="Please contact your registered friends on the platform and obtain an invitation code from the community event.">?</a></span></h6>
                            <input type="text" placeholder="Please enter your invitation code" name="referal_code" autocomplete="Invitation Code" autofocus>
                        </div>
                        <div class="col-12 complete-error">
                            <p >All fields are required</p>
                        </div>

                        <div class="col-12 text-center mt-4 completeBtn">
                            <button class="new-btn rounded-pill font-weight-bold bg-purple-gradient text-white px-4 py-2" id="completeBtn">Complete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Date of birth Modal end-->

<script type="text/javascript">
    $(document).ready(function() {
        // clear errors
        var year  = "<?php $date = strtotime( ''.date('Y').' -13 year'); echo date('Y', $date); ?>";
        document.getElementById('drop_down_select_month').innerText='Jan';
        document.getElementById('drop_down_select_date').innerText='01';
        document.getElementById('drop_down_select_year').innerText=year;

        $('.month_hidden').val('Jan');
        $('.date_hidden').val('01');
        $('.year_hidden').val(year);

        var element=document.querySelector('ul.dropdown_month > li.active');

        $(".invalid-feedback").children("strong").text("");
        $(".is-invalid").removeClass("is-invalid");

            $('#profileFormModal').submit(function(e) {
                e.preventDefault();

                // var month = $('.month_hidden').val();
                // var date = $('.date_hidden').val();
                // var year = $('.year_hidden').val();
                var month = $('.month_hidden').val();
                var date = $('.date_hidden').val();
                var year = $('.year_hidden').val();
                if(month =='' && date =='' && year ==''){
                    $('.complete-error').show();
                    $('.completeBtn').attr('disabled',true);
                }
                else{
                    $('.complete-error').hide();
                     $('.completeBtn').attr('disabled',false);
                }
                let formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "{{url('/completeProfile')}}",
                    headers: {
                        Accept: "application/json"
                    },
                    dataType:"JSON",
                    data: formData,
                    success: (response) => {
                        if (response[0].result == 1) 
                        {
                            window.location.reload();
                        }
                        else if (response[0].result == 0) 
                        {
                            $('.complete-error p').text(response[0].message);
                            $('.complete-error').show();
                        }
                        // else
                        // {
                        //     $.notify(response[0].message, 'error');
                        // }
                    },
                    error: (response) => {
                        // alert();
                    }
                })
            });
    })

    $('.scroll-div li a').click(function(){
        if($(this).parents('.scroll-div').hasClass('month')){
    
            
            $(this).parents('.month').find('li').removeClass('active');  
            var month = $.trim($(this).text());
            document.getElementById('drop_down_select_month').innerText = month;
            var parent = $(this).parents('.month').find('li.active a div.month_name').text();

          $('.month_hidden').val(month);
        }
        else if($(this).parents('.scroll-div').hasClass('date')){
          $(this).parents('.date').find('li').removeClass('active');  

          var date = $.trim($(this).text());
          document.getElementById('drop_down_select_date').innerText = date;
          $('.date_hidden').val(date);
        }
        else if($(this).parents('.scroll-div').hasClass('year')){
          $(this).parents('.year').find('li').removeClass('active');  

          var year = $.trim($(this).text());
          document.getElementById('drop_down_select_year').innerText = year;
          $('.year_hidden').val(year);
        }

        
        
        $(this).parent('li').addClass('active');
    });


    // Complete Modal Validation
    // const completeBtn = document.getElementById('completeBtn');
    // const nickName = document.getElementById('nickName');
    // const gender = document.getElementById('gender');
    // const month = document.getElementById('month');

    // // run this function whenever the values of any of the above 4 inputs change.
    // // this is to check if the input for all 4 is valid.  if so, enable completeBtn.
    // // otherwise, disable it.
    // const checkEnableButton = () => {
    //     completeBtn.disabled = !(
    //         nickName.value && 
    //         gender.value && 
    //         month.value !== 'Choose'
    //     )
    // }
    // alert(checkEnableButton);
    // nickName.addEventListener('change', checkEnableButton);
    // gender.addEventListener('change', checkEnableButton);
    // month.addEventListener('change', checkEnableButton);
</script>

