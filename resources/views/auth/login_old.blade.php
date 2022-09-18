@extends('layouts.auth_template')

@section('content')

     <!-- start of hero section -->
        <div id="hero" class="contact-section section" data-paneffect="true" ref="heroSection">
          <div class="container">
            <div class="section-content row">

              <!-- text box -->
              <div class="contact-text col-md-6">
                <div class="btext">
                  <img src="{{asset('auth/assets/images/groupe_3.png')}}" alt="" class="img_groupe_3">
                  <div class="bienvenu">
                    <img src="{{asset('auth/assets/images/Team_colla.svg')}}" alt="" class="Team_colla">
                </div>
                <img src="{{asset('auth/assets/images/groupe.png')}}" alt="" class="groupe">
                </div>
              </div>

              <!-- contact form -->
              <div class="col-md-6">
                <img src="{{asset('auth/assets/images/Rectangle.svg')}}" alt="" class="Rectangle">
                <form  class="contact-form form-styled form_op" action="{{ route('login') }}" method="post"
                style="visibility: inherit;background-color: #fff !important;">
                    @csrf
                  <div class="group">
                    <h3 class="textcol" style="font-size: 3.3rem;">Connexion</h3>
                    <p class="textcol font">à votre dashbord</p>
					@include('flashmessage')
                  </div>
                  <div class="group">
                    <div class="control has-prefix-icon">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mainanim" >
                                    <img src="{{asset('auth/assets/images/animation.gif')}}" alt="" style="width: 4rem;">
                                    <p style="margin-bottom: 0px;padding: 15px 0 10px 0;">Content de vous revoir</p>
                                </div>
                                <div class="col-md-2 infor">
                                    <i class="fa-solid fa-circle-info"></i>
                                </div>
                                <div class="col-md-2 inform">
                                    <i class="fa-solid fa-circle-question"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="group">
                    <label style="color:#54280A;">Entrez votre email professionnelle</label>
                    <div class="control has-prefix-icon">
                      <input type="mail"
                      placeholder="Addresse électronique entreprise"
                        name="email"
                        required 
                        style="background-color: #fff!important;" value="{{ old('email') }}">
                      <!-- validation errors messages -->
                      <div class="errors-msgs">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                  </div>
                  <div class="group">
                    <label style="color:#54280A;">Entrez votre mot de passe</label>
                    <div class="control has-prefix-icon">
                      <input class="ltr-dir"
                        type="password"
                        placeholder="Mot de passe"
                        name="password"
                        required style="background-color: #fff!important;">
                      <!-- validation errors messages -->
                      <div class="errors-msgs">
                        	@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="control has-prefix-icon">
                      <input class="ltr-dir"
                        type="checkbox"
                        name="resterconnecter"> Gardez-moi connecté
                      <!-- validation errors messages -->
                      <div class="errors-msgs">
                        <input class="required" type="hidden" value="Email is required">
                        <input class="invalid" value="Please enter a valid email address" style="background-color: #fff;">
                      </div>
                      <a href="#">Mot de passe oublié ?</a>
                      
                    </div>
                  </div>
                  <div class="group">
                    <div class="control">
                      <button class="submit-btn btn btn-col" type="submit"><i class="fa-solid fa-unlock" style="font-size: 1.3rem !important;color: #fff !important;"></i>Se connecter</button>
                    </div>
                  </div>
                </form>
                @endsection