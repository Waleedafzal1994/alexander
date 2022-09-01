@extends('layouts.app')
@section('style')
    <style>
        #profile_picture_img:hover {
            opacity: 0.7;
            cursor: pointer;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div style="min-height:300px; background:white; border-radius:4px;">
                    <div class="subheader-page rounded-top">
                        <h4>Edit Profile</h4>
                    </div>

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
                                            <button class="btn-success py-2 px-3 rounded" id="saveBtn" type="submit"
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
                                            <button class="btn-success py-2 px-3 rounded" type="submit" id="saveBtn"
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
                                        <option value="Non-Binary">Non-Binary</option>
                                        <!-- <option value="Other">Other</option> -->
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
                        <div class="col-md-4">
                            <br>
                            <label for="">TikTok</label>
                            <input type="url" name="tiktok_profile" class="input" placeholder="tiktok.com/@gamersplay" value="{{ $user->tiktok_profile }}">
                        </div>
                        <!-- <div class="col-md-4">
                            <br>
                            <label for="">Discord</label>
                            <input type="text" name="discord_handle" class="input" placeholder="GamersPlay#0000"
                                value="{{ $user->discord_handle }}">
                        </div> -->
                        <div class="col-md-12" style="text-align:center;">
                            <br>
                            <button type="submit" class="btn-success py-2 px-3 rounded">Save</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
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
    </script>
@endpush
