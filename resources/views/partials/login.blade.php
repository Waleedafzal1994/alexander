<style>
    #messageErrorLogin {
        text-align: center;
        font-size: 100%;
        margin-top: 0px;
    }
</style>
<div class="modal fade mt-4" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
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

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 login-modal-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active " data-toggle="tab" href="#loginPanel" role="tab">
                            <img class="navs-icons-modal" src="{{ asset('temp-services/images/3d/circle.png') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#registerPanel" role="tab">
                            <img class="navs-icons-modal" src="{{ asset('temp-services/images/3d/triangle.png') }}">
                            Register
                        </a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="loginPanel" role="tabpanel">
                        <div class="modal-body login-body">
                            <span class="invalid-feedback" role="alert" id="messageErrorLogin">
                                <strong></strong>
                            </span>
                            <form method="POST" id="loginForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h6>Email</h6>
                                            <input id="login-email" type="email" name="email" value="{{ old('email') }}" required autocomplete="new-email" autofocus>
                                            <span class="invalid-feedback" role="alert" id="name-login-error">
                                                <strong></strong>
                                            </span>

                                        </div>
                                        <div class="form-group">
                                            <h6>Password</h6>
                                            <input id="login-password" type="password" name="password" required autocomplete="login-current-password">
                                            
                                            <span class="password-showhide">
                                                <span class="show-password">Show</span>
                                                <span class="hide-password">Hide</span>
                                            </span>
                                        </div>
                                        <div class="link-forget-pwd">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                        {{-- <div class="form-group">
                                            <div style="display:flex; align-items:center;">
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }} style="width:initial; margin-right:10px; margin-bottom: 7px;
                                        ">
                                        <h6>Remember me? </h6>
                                    </div>
                                </div> --}}

                                <div class="form-group mt-5 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            ↻
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                    <span class="invalid-feedback" role="alert" id="captcha-login-error">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn button-primary w-100" id="login-submit-btn">Login</button>
                                </div>
                        </div>
                    </div>
                    </form>
                    {{-- <hr> --}}
                    <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4">
                        <p>Or log in with</p>
                        <div class="social-links d-flex align-items-center">
                            <div class="mr-2">
                                <a href="/auth/discord">
                                    <img class="discord-img-height" src="{{ asset('imgs/auth/discord.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/facebook.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/google.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/instagram.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/apple_logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Panel 8-->
            <div class="tab-pane fade" id="registerPanel" role="tabpanel">
                <!--Body-->
                <div class="modal-body login-body">
                    <span class="invalid-feedback" role="alert" id="messageErrorRegister">
                        <strong></strong>
                    </span>
                    <form method="POST" id="registerFormModal">
                        @csrf
                        <div class="row pb-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Nickname</h6>
                                            <input id="name-reg" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <span class="invalid-feedback" role="alert" id="name-reg-error">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Full Name</h6>
                                            <input id="real_name-reg" type="text" name="real_name" value="{{ old('real_name') }}" required autocomplete="real_name" autofocus>
                                            <span class="invalid-feedback" role="alert" id="real_name-reg-error">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Email</h6>
                                            <input id="email-reg" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <span class="invalid-feedback" role="alert" id="email-reg-error">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <h6>Password</h6>
                                            <input id="password-reg" type="password" name="password" required autocomplete="new-password">
                                            <span class="password-showhide">
                                                <span class="show-password">Show</span>
                                                <span class="hide-password">Hide</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <h6>Confirm</h6>
                                            <input id="password-confirm-reg" type="password" name="password_confirmation" required autocomplete="new-cnf-password">

                                            <span class="password-showhide">
                                                <span class="show-password">Show</span>
                                                <span class="hide-password">Hide</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 password-reg-error-msg">
                                        <span class="invalid-feedback" role="alert" id="password-reg-error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-1 ">
                                        <input class="mb-1 mr-1" type="checkbox" name="tnc" id="register-tnc" {{ old('tnc') ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <h6>After checking, you are indicating that you have read and
                                                acknowledge the <a target="_blank" rel="noreferrer" href="https://www.gamersplay.gg/terms-of-service">GamersPlay
                                                    Platform Terms of Service.</a></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-md-12 ">                                  
                                        <button class="button-primary w-100" type="submit" id="reg-submit-btn" data-toggle="modal" data-target="#dotModal" data-backdrop="static" data-keyboard="false">Create
                                            Account</button>
                                            <!-- <button class="button-primary w-100" type="submit" id="reg-submit-btn">Create
                                            Account</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <div class="d-flex align-items-center justify-content-between pt-3 border-top mt-4">
                        <p>Or log in with</p>
                        <div class="social-links d-flex align-items-center">
                            <div class="mr-2">
                                <a href="/auth/discord">
                                    <img class="discord-img-height" src="{{ asset('imgs/auth/discord.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/facebook.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/google.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="mr-2">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/instagram.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="">
                                <a href="">
                                    <img class="discord-img-height" src="{{ asset('imgs/icons/apple_logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!--/.Panel 8-->
        </div>
    </div>
</div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        // clear errors
        $(".invalid-feedback").children("strong").text("");
        $(".is-invalid").removeClass("is-invalid");

        const regbutton = $('#reg-submit-btn'); // The submit input id 
        regbutton.attr('disabled', 'disabled');
        regbutton.css("cursor", "not-allowed");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('[data-dismiss=modal]').on('click', function(e) {
            var $t = $(this),
                target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

            $(target)
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end()
                .find("input[type=text],input[type=password],input[type=email]")
                .val('')
                .end();
            regbutton.attr('disabled', 'disabled')
                .css("cursor", "not-allowed");
            $(".invalid-feedback").children("strong").text("");
            $(".is-invalid").removeClass("is-invalid");
        });

        $('#register-tnc').change(function() { // The checkbox id 
            if (this.checked) {
                regbutton.removeAttr('disabled')
                    .css("cursor", "pointer");
            } else {
                regbutton.attr('disabled', 'disabled')
                    .css("cursor", "not-allowed");
            }
        });

        $(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/auth/login",
                    headers: {
                        Accept: "application/json"
                    },
                    data: formData,
                    success: function(response) {
                        if (response.code === 200) {
                            window.location.reload();
                        }
                    },
                    error: function(response) {
                        console.log("error1", response);
                        if (response.status === 401) {
                            $("#messageErrorLogin").addClass("is-invalid d-block")
                                .children(
                                    "strong")
                                .text(
                                    response.responseJSON.message);
                        } else if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function(key) {
                                $("#" + key + "-login-error").addClass(
                                    "is-invalid d-block");
                                $("#" + key + "-login-error").children(
                                    "strong").text(errors[key][0]);
                            });
                        } else if (response.status === 500) {
                            $("#messageErrorLogin").addClass("is-invalid d-block")
                                .children(
                                    "strong")
                                .text(
                                    response.responseJSON.errors);
                        } else {
                            window.location.reload();
                        }
                        $("#captcha").val("");
                        reloadCaptcha();
                    }
                })
            });
            $('#registerFormModal').submit(function(e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/auth/register",
                    headers: {
                        Accept: "application/json"
                    },
                    data: formData,
                    success: (response) => {
                        if (response.code === 200) {
                            window.location.reload();
                        }
                    },
                    error: (response) => {
                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function(key) {
                                $("#" + key + "-reg-error").addClass(
                                    "is-invalid d-block");
                                $("#" + key + "-reg-error").children(
                                    "strong").text(errors[key][0]);
                            });
                        } else if (response.responseJSON.code === 401) {
                            $("#messageErrorRegister").addClass(
                                    "is-invalid d-block").children(
                                    "strong")
                                .text(
                                    response.responseJSON.message);
                        } else if (response.status === 500) {
                            $("#messageErrorRegister").addClass(
                                    "is-invalid d-block")
                                .children(
                                    "strong")
                                .text(
                                    response.responseJSON.errors);
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })

        $('#reload').click(function() {
            reloadCaptcha();
        });

        // setInterval(() => {
        //     reloadCaptcha();
        // }, 60 * 1000);

        function reloadCaptcha() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        }

        // Password hide show

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

    });
</script>