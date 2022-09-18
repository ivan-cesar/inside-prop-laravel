@extends('layouts.auth_template')

@section('content')


        <!-- start of hero section -->
        <div id="hero"
          class="contact-section section"
          data-paneffect="true"
          ref="heroSection">
          <div class="container">
            <div class="section-content row">

              <!-- text box -->
              <div class="contact-text col-md-6">
                <div class="btext">
                  <img src="{{asset('public/auth/assets/images/groupe_3.png') }}" alt="" class="img_groupe_3">
                  <div class="bienvenu">
                    <h3 class="textcol" style="font-size: 3.3rem;">
                      Bienvenue
                    </h3>
                    <p class="textcol" style="font-size: 1.5rem;">
                      sur votre espace collaboratif
                    </p>
                    <img src="{{asset('public/auth/assets/images/image_team.svg') }}" alt=""  class="image_team">
                </div>
                <img src="{{asset('public/auth/assets/images/groupe.png') }}" alt="" class="groupe bas">
                </div>
              </div>

              <!-- contact form -->
              <div class="col-md-6">
                <img src="{{asset('public/auth/assets/images/Rectangle.svg') }}" alt="" class="Rectangle">
                <form ref="contactForm"
                  class="contact-form form-styled form_op"
                  action="{{ route('login') }}" 
                  method="post"
                  data-success-msg="Message sent successfully!"
                  data-err-msg="Oops! something went wrong, please try again.">
                    @csrf
                  <div class="group">
                    <h3 class="textcol" style="font-size: 3.3rem;">Hello</h3>
                    <p class="textcol font">monsieur <span class="textcol fontbold">Paul André KOFFI</span></p>
                    <P class="desc">Pour votre première connexion veuillez créer votre mot de passe <br/>
                      pour accédez au quotidien à votre espace collaboratif
                    </P>
                  </div>
                  <div class="group">
                    <label>Creez votre mot de passe personnel</label>
                    <div class="control has-prefix-icon">
                      <input type="password"
                      placeholder="Entrez votre nouveau mot de passe"
                        name="password"
                        required>
                      <!-- validation errors messages -->
                      <div class="errors-msgs">
                        <input class="required" type="hidden" value="Name is required">
                        <input class="minLength" type="hidden" value="Name must be at least 3 characters">
                      </div>
                    </div>
                  </div>
                  <div class="group">
                    <label>Confirmez le mot de passe personnel</label>
                    <div class="control has-prefix-icon">
                      <input class="ltr-dir"
                        type="password"
                        placeholder="Confirmation du mot de passe"
                        name="conpassword"
                        required>
                      <!-- validation errors messages -->
                      <div class="errors-msgs">
                        <input class="required" type="hidden" value="Email is required">
                        <input class="invalid" type="hidden" value="Please enter a valid email address">
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
                        <input class="invalid" type="hidden" value="Please enter a valid email address">
                      </div>
                    </div>
                  </div>
                  <div class="group">
                    <div class="control">
                      <button class="submit-btn btn btn-col" type="button" @click="contactFormValidation"><i style="margin-right: 5px;" class="fa-regular fa-circle-check"></i>Validez</button>
                    </div>
                  </div>
                </form>

@endsection