<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string',  'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
<!--=========== breadcrumb Section Start =========-->
{{-- <div class="sc-breadcrumb-style sc-pt-135 sc-pb-110">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-12">
                <div class="sc-slider-content p-z-idex">
                    <div class="sc-slider-subtitle">Home - Register</div>
                    <h1 class="slider-title white-color sc-mb-25 sc-sm-mb-15">Account Registration</h1>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--=========== breadcrumb Section End =========-->
@include('partials.header-register')

<section class="contact-page-wrap section-padding">

<div class="container" style="margin: auto !important">
      <!-- Login & Register Box Start -->
                    <div class="card">
                        <!-- Section Title Start -->
                        <div class="card-header">
                            <h3 class="" style="font-size: 2.5rem !important; color:#191970">Setup your account</h3>
                        </div>
                        <!-- Section Title End -->
                                                         <div class="card-body">
                            <form method="post" action="{{route('register')}}"  class="contact-form">
                                @csrf
                                <div class="form-group">
                                    Full name
                                    <input type="text" class="form-control" placeholder="Full name" name="name"  value="{{old('name')}}" required>
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    Email Address
                                    <input type="email" name="email" required="required" class="form-control" placeholder="Email"  value="" required="" >
                                    @error('email')
                                    <p class="text-danger">
                                     {{$message}}
                                 </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    Phone number [eg. +44721223***]
                                    <input type="text" name="phone" required="required" class="form-control" placeholder="Phone number"   value="" required="" >
                                    @error('phone')
                                    <p class="text-danger">
                                     {{$message}}
                                 </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Country: </label>
                                   <select id="country" name="country" required class="form-control">
                                          <option value="">--Please select a country--</option>
                                          <option value="Afghanistan">Afghanistan (AF)</option>
                                          <option value="Albania">Albania (AL)</option>
                                          <option value="Algeria">Algeria (DZ)</option>
                                          <option value="Andorra">Andorra (AD)</option>
                                          <option value="Angola">Angola (AO)</option>
                                          <option value="Antigua and Barbuda">Antigua and Barbuda (AG)</option>
                                          <option value="Argentina">Argentina (AR)</option>
                                          <option value="Armenia">Armenia (AM)</option>
                                          <option value="Australia">Australia (AU)</option>
                                          <option value="Austria">Austria (AT)</option>
                                          <option value="Azerbaijan">Azerbaijan (AZ)</option>
                                          <option value="Bahamas">Bahamas (BS)</option>
                                          <option value="Bahrain">Bahrain (BH)</option>
                                          <option value="Bangladesh">Bangladesh (BD)</option>
                                          <option value="Barbados">Barbados (BB)</option>
                                          <option value="Belarus">Belarus (BY)</option>
                                          <option value="Belgium">Belgium (BE)</option>
                                          <option value="Belize">Belize (BZ)</option>
                                          <option value="Benin">Benin (BJ)</option>
                                          <option value="Bhutan">Bhutan (BT)</option>
                                          <option value="Bolivia">Bolivia (BO)</option>
                                          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina (BA)</option>
                                          <option value="Botswana">Botswana (BW)</option>
                                          <option value="Brazil">Brazil (BR)</option>
                                          <option value="Brunei">Brunei (BN)</option>
                                          <option value="Bulgaria">Bulgaria (BG)</option>
                                          <option value="Burkina Faso">Burkina Faso (BF)</option>
                                          <option value="Burundi">Burundi (BI)</option>
                                          <option value="Cambodia">Cambodia (KH)</option>
                                          <option value="Cameroon">Cameroon (CM)</option>
                                          <option value="Canada">Canada (CA)</option>
                                          <option value="Cape Verde">Cape Verde (CV)</option>
                                          <option value="Central African Republic">Central African Republic (CF)</option>
                                          <option value="Chad">Chad (TD)</option>
                                          <option value="Chile">Chile (CL)</option>
                                          <option value="China">China (CN)</option>
                                          <option value="Colombia">Colombia (CO)</option>
                                          <option value="Comoros">Comoros (KM)</option>
                                          <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the (CD)</option>
                                          <option value="Congo, Republic of the">Congo, Republic of the (CG)</option>
                                          <option value="Costa Rica">Costa Rica (CR)</option>
                                          <option value="Cote d'Ivoire">Cote d'Ivoire (CI)</option>
                                          <option value="Croatia">Croatia (HR)</option>
                                          <option value="Cuba">Cuba (CU)</option>
                                        <option value="Cyprus">Cyprus (CY)</option>
                                        <option value="Czech Republic">Czech Republic (CZ)</option>
                                        <option value="Denmark">Denmark (DK)</option>
                                        <option value="Djibouti">Djibouti (DJ)</option>
                                        <option value="Dominica">Dominica (DM)</option>
                                        <option value="Dominican Republic">Dominican Republic (DO)</option>
                                        <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste) (TL)</option>
                                        <option value="Ecuador">Ecuador (EC)</option>
                                        <option value="Egypt">Egypt (EG)</option>
                                        <option value="El Salvador">El Salvador (SV)</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea (GQ)</option>
                                        <option value="Eritrea">Eritrea (ER)</option>
                                        <option value="Estonia">Estonia (EE)</option>
                                        <option value="Eswatini">Eswatini (SZ)</option>
                                        <option value="Ethiopia">Ethiopia (ET)</option>
                                        <option value="Fiji">Fiji (FJ)</option>
                                        <option value="Finland">Finland (FI)</option>
                                        <option value="France">France (FR)</option>
                                        <option value="Gabon">Gabon (GA)</option>
                                        <option value="Gambia">Gambia (GM)</option>
                                        <option value="Georgia">Georgia (GE)</option>
                                        <option value="Germany">Germany (DE)</option>
                                        <option value="Ghana">Ghana (GH)</option>
                                        <option value="Greece">Greece (GR)</option>
                                        <option value="Grenada">Grenada (GD)</option>
                                        <option value="Guatemala">Guatemala (GT)</option>
                                        <option value="Guinea">Guinea (GN)</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau (GW)</option>
                                        <option value="Guyana">Guyana (GY)</option>
                                        <option value="Haiti">Haiti (HT)</option>
                                        <option value="Honduras">Honduras (HN)</option>
                                        <option value="Hungary">Hungary (HU)</option>
                                        <option value="Iceland">Iceland (IS)</option>
                                        <option value="India">India (IN)</option>
                                        <option value="Indonesia">Indonesia (ID)</option>
                                        <option value="Iran">Iran (IR)</option>
                                        <option value="Iraq">Iraq (IQ)</option>
                                        <option value="Ireland">Ireland (IE)</option>
                                        <option value="Israel">Israel (IL)</option>
                                        <option value="Italy">Italy (IT)</option>
                                        <option value="Jamaica">Jamaica (JM)</option>
                                        <option value="Japan">Japan (JP)</option>
                                        <option value="Jordan">Jordan (JO)</option>
                                        <option value="Kazakhstan">Kazakhstan (KZ)</option>
                                        <option value="Kenya">Kenya (KE)</option>
                                        <option value="Kiribati">Kiribati (KI)</option>
                                        <option value="Korea, North">Korea, North (KP)</option>
                                        <option value="Korea, South">Korea, South (KR)</option>
                                        <option value="Kosovo">Kosovo (XK)</option>
                                        <option value="Kuwait">Kuwait (KW)</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan (KG)</option>
                                        <option value="Laos">Laos (LA)</option>
                                        <option value="Latvia">Latvia (LV)</option>
                                          <option value="Lebanon">Lebanon (LB)</option>
                                          <option value="Lesotho">Lesotho (LS)</option>
                                          <option value="Liberia">Liberia (LR)</option>
                                          <option value="Libya">Libya (LY)</option>
                                          <option value="Liechtenstein">Liechtenstein (LI)</option>
                                          <option value="Lithuania">Lithuania (LT)</option>
                                          <option value="Luxembourg">Luxembourg (LU)</option>
                                          <option value="Macao">Macao (MO)</option>
                                          <option value="Madagascar">Madagascar (MG)</option>
                                          <option value="Malawi">Malawi (MW)</option>
                                          <option value="Malaysia">Malaysia (MY)</option>
                                          <option value="Maldives">Maldives (MV)</option>
                                          <option value="Mali">Mali (ML)</option>
                                          <option value="Malta">Malta (MT)</option>
                                          <option value="Marshall Islands">Marshall Islands (MH)</option>
                                          <option value="Martinique">Martinique (MQ)</option>
                                          <option value="Mauritania">Mauritania (MR)</option>
                                          <option value="Mauritius">Mauritius (MU)</option>
                                          <option value="Mayotte">Mayotte (YT)</option>
                                          <option value="Mexico">Mexico (MX)</option>
                                          <option value="Micronesia, Federated States of">Micronesia, Federated States of (FM)</option>
                                          <option value="Moldova, Republic of">Moldova, Republic of (MD)</option>
                                          <option value="Monaco">Monaco (MC)</option>
                                          <option value="Mongolia">Mongolia (MN)</option>
                                          <option value="Montenegro">Montenegro (ME)</option>
                                          <option value="Montserrat">Montserrat (MS)</option>
                                          <option value="Morocco">Morocco (MA)</option>
                                          <option value="Mozambique">Mozambique (MZ)</option>
                                          <option value="Myanmar">Myanmar (MM)</option>
                                          <option value="Namibia">Namibia (NA)</option>
                                          <option value="Nauru">Nauru (NR)</option>
                                          <option value="Nepal">Nepal (NP)</option>
                                          <option value="Netherlands">Netherlands (NL)</option>
                                          <option value="New Caledonia">New Caledonia (NC)</option>
                                          <option value="New Zealand">New Zealand (NZ)</option>
                                          <option value="Nicaragua">Nicaragua (NI)</option>
                                          <option value="Niger">Niger (NE)</option>
                                          <option value="Nigeria">Nigeria (NG)</option>
                                          <option value="Niue">Niue (NU)</option>
                                          <option value="Norfolk Island">Norfolk Island (NF)</option>
                                          <option value="North Korea">North Korea (KP)</option>
                                          <option value="North Macedonia">North Macedonia (MK)</option>
                                          <option value="Northern Mariana Islands">Northern Mariana Islands (MP)</option>
                                          <option value="Norway">Norway (NO)</option>
                                          <option value="Oman">Oman (OM)</option>
                                          <option value="Pakistan">Pakistan (PK)</option>
                                          <option value="Palau">Palau (PW)</option>
                                          <option value="Palestine, State of">Palestine, State of (PS)</option>
                                          <option value="Panama">Panama (PA)</option>
                                          <option value="Papua New Guinea">Papua New Guinea (PG)</option>
                                          <option value="Paraguay">Paraguay (PY)</option>
                                          <option value="Peru">Peru (PE)</option>
                                          <option value="Philippines">Philippines (PH)</option>
                                          <option value="Pitcairn">Pitcairn (PN)</option>
                                          <option value="Poland">Poland (PL)</option>
                                          <option value="Portugal">Portugal (PT)</option>
                                          <option value="Puerto Rico">Puerto Rico (PR)</option>
                                          <option value="Qatar">Qatar (QA)</option>
                                          <option value="Réunion">Réunion (RE)</option>
                                          <option value="Romania">Romania (RO)</option>
                                          <option value="Russian Federation">Russian Federation (RU)</option>
                                          <option value="Rwanda">Rwanda (RW)</option>
                                          <option value="Saint Barthélemy">Saint Barthélemy (BL)</option>
                                          <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha (SH)</option>
                                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis (KN)</option>
                                          <option value="Saint Lucia">Saint Lucia (LC)</option>
                                          <option value="Saint Martin (French part)">Saint Martin (French part) (MF)</option>
                                          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon (PM)</option>
                                          <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines (VC)</option>
                                          <option value="Samoa">Samoa (WS)</option>
                                          <option value="San Marino">San Marino (SM)</option>
                                          <option value="Sao Tome and Principe">Sao Tome and Principe (ST)</option>
                                          <option value="Saudi Arabia">Saudi Arabia (SA)</option>
                                          <option value="Senegal">Senegal (SN)</option>
                                          <option value="Serbia">Serbia (RS)</option>
                                          <option value="Seychelles">Seychelles (SC)</option>
                                          <option value="Sierra Leone">Sierra Leone (SL)</option>
                                          <option value="Singapore">Singapore (SG)</option>
                                          <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part) (SX)</option>
                                          <option value="Slovakia">Slovakia (SK)</option>
                                          <option value="Slovenia">Slovenia (SI)</option>
                                          <option value="Solomon Islands">Solomon Islands (SB)</option>
                                          <option value="Somalia">Somalia (SO)</option>
                                          <option value="South Africa">South Africa (ZA)</option>
                                          <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands (GS)</option>
                                          <option value="South Sudan">South Sudan (SS)</option>
                                          <option value="Spain">Spain (ES)</option>
                                            <option value="Sri Lanka">Sri Lanka (LK)</option>
                                            <option value="Sudan">Sudan (SD)</option>
                                            <option value="Suriname">Suriname (SR)</option>
                                            <option value="Sweden">Sweden (SE)</option>
                                            <option value="Switzerland">Switzerland (CH)</option>
                                            <option value="Syria">Syria (SY)</option>
                                            <option value="Taiwan">Taiwan (TW)</option>
                                            <option value="Tajikistan">Tajikistan (TJ)</option>
                                            <option value="Tanzania">Tanzania (TZ)</option>
                                            <option value="Thailand">Thailand (TH)</option>
                                            <option value="Timor-Leste">Timor-Leste (TL)</option>
                                            <option value="Togo">Togo (TG)</option>
                                            <option value="Tonga">Tonga (TO)</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago (TT)</option>
                                            <option value="Tunisia">Tunisia (TN)</option>
                                            <option value="Turkey">Turkey (TR)</option>
                                            <option value="Turkmenistan">Turkmenistan (TM)</option>
                                            <option value="Tuvalu">Tuvalu (TV)</option>
                                            <option value="Uganda">Uganda (UG)</option>
                                            <option value="Ukraine">Ukraine (UA)</option>
                                            <option value="United Arab Emirates">United Arab Emirates (AE)</option>
                                            <option value="United Kingdom">United Kingdom (UK)</option>
                                            <option value="United States">United States (US)</option>
                                            <option value="Uruguay">Uruguay (UY)</option>
                                            <option value="Uzbekistan">Uzbekistan (UZ)</option>
                                            <option value="Vanuatu">Vanuatu (VU)</option>
                                            <option value="Vatican City">Vatican City (VA)</option>
                                            <option value="Venezuela">Venezuela (VE)</option>
                                            <option value="Vietnam">Vietnam (VN)</option>
                                            <option value="Yemen">Yemen (YE)</option>
                                            <option value="Zambia">Zambia (ZM)</option>
                                            <option value="Zimbabwe">Zimbabwe (ZW)</option>
                                          </select>
                                          @error('country')
                                          <p class="text-danger">
                                           {{$message}}
                                       </p>
                                          @enderror
                                 </div>
                                <div class="form-group">
                                    Password
                                    <input type="password" class="form-control" name="password" placeholder="Password " required>
                                   @error('password')
                                   <p class="text-danger">
                                    {{$message}}
                                </p>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    Confirm Password
                                    <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password ">
                                </div>
                                <div class="form-group">

                                    <input type="hidden" value="{{ request()->query('ref') }}" class="form-control" name="ref"  >
                                </div>
                                <div class="form-group"><br/>
                                    <input class="btn"  type="submit" name="Register" value="Register" style="background:#191970; color:#fff">
                                </div>
                                <div class="form-group"><a href="{{route('login')}}" style="color:#191970">Already, have an account? Click here to login.</a> </div>
                            </form>
                        </div>

                    </div>
                    <!-- Login & Register Box End -->

</div>

</div>

@include('partials.footer-register')
