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
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-back-tab" href="/service/{{$user->id}}" role="tab" aria-controls="pills-settings" aria-selected="false">Back</a>
                    </li>
                </ul>
                <div class="tab-content bg-white rounded p-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab">
                        <h3 class="my-3">Profile Information</h3>
                        <div class="row" style="padding:15px;">
                            <div class="col-md-4">
                                <form method="POST" enctype="multipart/form-data" id="ajax-profile" action="javascript:void(0)">
                                    <input type="hidden" name="id" value="{{ $user->id }}" style="display:none;">
                                    @csrf
                                    @if ($user->profile_picture)
                                        <div style="display:Flex; justify-content:center; flex-direction:column;">
                                            <div style="text-align: center;">
                                                <img src="{{ $user->profile_picture }}"
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
                                                <button class="btn btn-success" id="saveBtn" type="submit"
                                                    style="display:none;">Save</button>
                                                <a class="btn btn-danger"
                                                    href="/profile/{{ $user->id }}/removeAvatar">Remove</a>
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
                                                <button class="btn btn-success" type="submit" id="saveBtn"
                                                    style="display:none;">Save</button>
                                            </div>

                                        </div>
                                    @endif
                                </form>


                            </div>

                            <div class="col-md-4">
                                <form method="POST" action="/profile/{{ $user->id }}/edit">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    {{-- Form Element --}}
                                    <div class="form-group">
                                        <label for="">Nickname</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                    {{-- Form Element --}}
                                    <div class="form-group">
                                        <label for="">Profile Subtitle</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $user->user_title }}">
                                    </div>
                                    {{-- Form Element --}}
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Primary & Secondary Language</label>
                                        <select name="primary_language" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Afrikaans">Afrikaans</option>
                                            <option value="Albanian">Albanian</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Armenian">Armenian</option>
                                            <option value="Basque">Basque</option>
                                            <option value="Bosnian">Bosnian</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="Bulgarian">Bulgarian</option>
                                            <option value="Catalan">Catalan</option>
                                            <option value="Cambodian">Cambodian</option>
                                            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                            <option value="Croatian">Croatian</option>
                                            <option value="Czech">Czech</option>
                                            <option value="Danish">Danish</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="English">English</option>
                                            <option value="Estonian">Estonian</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finnish">Finnish</option>
                                            <option value="French">French</option>
                                            <option value="Georgian">Georgian</option>
                                            <option value="German">German</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option value="Hebrew">Hebrew</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Hungarian">Hungarian</option>
                                            <option value="Icelandic">Icelandic</option>
                                            <option value="Indonesian">Indonesian</option>
                                            <option value="Irish">Irish</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Javanese">Javanese</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Latin">Latin</option>
                                            <option value="Latvian">Latvian</option>
                                            <option value="Lithuanian">Lithuanian</option>
                                            <option value="Macedonian">Macedonian</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Maltese">Maltese</option>
                                            <option value="Maori">Maori</option>
                                            <option value="Marathi">Marathi</option>
                                            <option value="Mongolian">Mongolian</option>
                                            <option value="Nepali">Nepali</option>
                                            <option value="Norwegian">Norwegian</option>
                                            <option value="Persian">Persian</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Quechua">Quechua</option>
                                            <option value="Romanian">Romanian</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Samoan">Samoan</option>
                                            <option value="Serbian">Serbian</option>
                                            <option value="Slovak">Slovak</option>
                                            <option value="Slovenian">Slovenian</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="Swahili">Swahili</option>
                                            <option value="Swedish ">Swedish </option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Tatar">Tatar</option>
                                            <option value="Telugu">Telugu</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Tibetan">Tibetan</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Ukrainian">Ukrainian</option>
                                            <option value="Urdu">Urdu</option>
                                            <option value="Uzbek">Uzbek</option>
                                            <option value="Vietnamese">Vietnamese</option>
                                            <option value="Welsh">Welsh</option>
                                            <option value="Xhosa">Xhosa</option>
                                        </select>
                                        <br>
                                        <select name="secondary_language" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Afrikaans">Afrikaans</option>
                                            <option value="Albanian">Albanian</option>
                                            <option value="Arabic">Arabic</option>
                                            <option value="Armenian">Armenian</option>
                                            <option value="Basque">Basque</option>
                                            <option value="Bosnian">Bosnian</option>
                                            <option value="Bengali">Bengali</option>
                                            <option value="Bulgarian">Bulgarian</option>
                                            <option value="Catalan">Catalan</option>
                                            <option value="Cambodian">Cambodian</option>
                                            <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                            <option value="Croatian">Croatian</option>
                                            <option value="Czech">Czech</option>
                                            <option value="Danish">Danish</option>
                                            <option value="Dutch">Dutch</option>
                                            <option value="English">English</option>
                                            <option value="Estonian">Estonian</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finnish">Finnish</option>
                                            <option value="French">French</option>
                                            <option value="Georgian">Georgian</option>
                                            <option value="German">German</option>
                                            <option value="Greek">Greek</option>
                                            <option value="Gujarati">Gujarati</option>
                                            <option value="Hebrew">Hebrew</option>
                                            <option value="Hindi">Hindi</option>
                                            <option value="Hungarian">Hungarian</option>
                                            <option value="Icelandic">Icelandic</option>
                                            <option value="Indonesian">Indonesian</option>
                                            <option value="Irish">Irish</option>
                                            <option value="Italian">Italian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Javanese">Javanese</option>
                                            <option value="Korean">Korean</option>
                                            <option value="Latin">Latin</option>
                                            <option value="Latvian">Latvian</option>
                                            <option value="Lithuanian">Lithuanian</option>
                                            <option value="Macedonian">Macedonian</option>
                                            <option value="Malay">Malay</option>
                                            <option value="Malayalam">Malayalam</option>
                                            <option value="Maltese">Maltese</option>
                                            <option value="Maori">Maori</option>
                                            <option value="Marathi">Marathi</option>
                                            <option value="Mongolian">Mongolian</option>
                                            <option value="Nepali">Nepali</option>
                                            <option value="Norwegian">Norwegian</option>
                                            <option value="Persian">Persian</option>
                                            <option value="Polish">Polish</option>
                                            <option value="Portuguese">Portuguese</option>
                                            <option value="Punjabi">Punjabi</option>
                                            <option value="Quechua">Quechua</option>
                                            <option value="Romanian">Romanian</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Samoan">Samoan</option>
                                            <option value="Serbian">Serbian</option>
                                            <option value="Slovak">Slovak</option>
                                            <option value="Slovenian">Slovenian</option>
                                            <option value="Spanish">Spanish</option>
                                            <option value="Swahili">Swahili</option>
                                            <option value="Swedish ">Swedish </option>
                                            <option value="Tamil">Tamil</option>
                                            <option value="Tatar">Tatar</option>
                                            <option value="Telugu">Telugu</option>
                                            <option value="Thai">Thai</option>
                                            <option value="Tibetan">Tibetan</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Turkish">Turkish</option>
                                            <option value="Ukrainian">Ukrainian</option>
                                            <option value="Urdu">Urdu</option>
                                            <option value="Uzbek">Uzbek</option>
                                            <option value="Vietnamese">Vietnamese</option>
                                            <option value="Welsh">Welsh</option>
                                            <option value="Xhosa">Xhosa</option>
                                        </select>
                                    </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="real_name" class="form-control" value="{{ $user->real_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Age</label>
                                    <input type="date" name="birth_date" class="form-control" value="{{ $user->birth_date }}">
                                </div>



                                {{-- Form Element --}}
                                <div class="form-group">
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
                                </div>
                                {{-- Form Element --}}
                                <div class="form-group">
                                    <label for="">About Me</label>
                                    <textarea type="text" name="description" class="form-control"
                                        rows="3">{{ $user->description }}</textarea>
                                </div>
                            </div>
                            <div class="subheader-page rounded-top" style="margin-bottom:10px;">
                                <h4>Socials</h4>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <label for="">Facebook</label>
                                <input type="url" name="facebook_profile" class="input" style="margin-bottom:10px;"
                                    placeholder="facebook.com/gamersplay" value="{{ $user->facebook_profile }}">
                                <label for="">Twitch</label>
                                <input type="url" name="twitch_profile" class="input"
                                    placeholder="twitch.tv/gamersplay" value="{{ $user->twitch_profile }}">
                            </div>
                            <div class="col-md-4">
                                <br>
                                <label for="">Instagram</label>
                                <input type="url" name="instagram_profile" class="input" placeholder="@gamersplay"
                                    value="{{ $user->instagram_profile }}">
                            </div>
        
                            <div class="col-md-12" style="text-align:center;">
                                <br>
                                <button type="submit" class="btn btn-success">Save</button>
                                </form>
                            </div>

                        </div>
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
    var profilePicChanged = false;
    $(document).ready(function() {
        @if ($user->country)
            $('select[name="country"]').val('{{ $user->country }}');
        @endif
        @if ($user->gender)
            $('select[name="gender"]').val('{{ $user->gender }}');
        @endif
        @if ($user->primary_language)
            $('select[name="primary_language"]').val('{{ $user->primary_language }}');
        @endif
        @if ($user->secondary_language)
            $('select[name="secondary_language"]').val('{{ $user->secondary_language }}');
        @endif
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
                url: "/profile/{{ $user->id }}/editAvatar",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    window.location.reload();
                },
                error: function(response) {
                    console.log("error1", response);
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
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

</script>