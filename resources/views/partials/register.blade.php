<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true" style="margin-top:125px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <img src="/imgs/gplogopurple.svg" alt="" srcset="" style="height:32px; margin-right:25px;">
                </div>
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="registerForm">
                    @csrf

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-12 col-form-label text-center">{{ __('Nickname') }}</label>

                        <div class="col-md-12">
                            <input id="nameInput" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="GamersPlay" autofocus>

                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nameInput" class="col-md-12 col-form-label text-center">Full Name</label>

                        <div class="col-md-12">
                            <input id="rnameInput" type="text" class="form-control" name="real_name" value="{{ old('real_name') }}"  autocomplete="real_name" placeholder="Gamers Play" autofocus>

                            <span class="invalid-feedback" role="alert" id="real_nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-12 col-form-label text-center">{{ __('E-Mail') }}</label>

                        <div class="col-md-12">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="account@gamersplay.gg">

                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="passwordInput" class="col-md-12 col-form-label text-center">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="passwordInput" type="password" class="form-control" name="password" required autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert" id="passwordError">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label text-center">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm-register" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
              

            

                    <div class="form-group row mb-0 text-center">
                        <div class="col-md-12">
                            <button type="submit" id="registerBtn" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

$(function () {

    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ route('home') }}"),
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
                        if(key == 'password') {
                            $("#" + key + "Error").children("strong").text($("#" + key + "Error").children("strong").text() + ' Your password must be 8 characters or longer and include at least one lower case letter, uppercase letter and a special symbol.');
                        }
                    });
                } else {
                    window.location.reload();
                }
            }
        })
    });
})
</script>
