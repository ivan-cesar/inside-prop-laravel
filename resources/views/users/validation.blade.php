<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
@extends('layouts.template_valida')
@section('content')

 <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="premiere-connexion" />
    <div class="container-center-horizontal">
      <form class="premiere-connexion screen" name="form1" action="{{route('users.validation_store')}}" method="post">
        @csrf
        <div class="overlap-group14">
          <div class="overlap-group12">
            <div class="rectangle"></div>
            <div class="group-61">
              <div class="sign-in">Hello</div>
              <div class="group-49">
                <div class="welcome-to-lorem"><span class="span0">{{ $user->sexe != 1 ? 'Monsieur' : 'Madame' }}</span><span> {{$user->name}} {{$user->prenoms}}</span></div>
                <div class="overlap-group">
                  <div class="rectangle-30"></div>
                  <p class="lorem-ipsum-is-simpl">
                    Pour votre première connexion veuillez créer votre mot de passe pour accédez au quotidien à votre
                    espace collaboratif
                  </p>
                </div>
              </div>
              <div class="group-53" style="width: 99%;margin-top: 2%;">
                <input
                  class="rectangle-17"
                  name="email"
                  type="hidden"
                  value="{{request()->input('email') ?? ''}}"/>
                @include('flashmessage')
              </div>
              <div class="group-54">
                <p class="creez-password poppins-normal-black-16px">Créez votre mot de passe personnel</p>
                <div style="display:inline-flex">
                <input
                  class="rectangle-17"
                  name="password"
                  placeholder="Entrez votre nouveau mot de passe"
                  type="password"
                  id="password"
                  required
                />
                 <i class="bi bi-eye-slash" id="togglePassword" style="position: relative;bottom: 16%;margin-left: 2%;font-size: 29px;padding: 27px 0px 10px 0px;"></i>
                 </div>
              </div>
              <div class="group-55">
                <p class="password-confirm poppins-normal-black-16px">Confirmez le mot de passe personnel</p>
                <div style="display:inline-flex">
                <input
                  class="rectangle-17-1"
                  name="password_conf"
                  id="password_conf"
                  placeholder="Confirmation du mot de Passe"
                  type="password"
                  required
                />
                <i class="bi bi-eye-slash" id="togglePasswordConf" style="position: relative;bottom: 16%;margin-left: 2%;font-size: 29px;padding: 27px 0px 10px 0px;"></i>
              </div>
             </div>
              <!--<div class="flex-row">
                <input class="icon-awesome-check-square" type="checkbox" name="" id="">
                <div class="garder-connect poppins-normal-cioccolato-13px" style="padding-top: 5px;">Gardez-moi connecté</div>
              </div>-->
                <div class="group-56">
                  <button class="valider" style="background-color: #ff6e00;border: none;width: 100%;">
                    <i style="margin-right: 5px;" class="fa-regular fa-circle-check"></i>
                    Valider
                  </button>
                </div>
            </div>
          </div>
          <div class="group-container">
            <div class="groupe-3">
              <div class="overlap-group-1">
                <img class="subtract" src="{{asset('public/auth/img/subtract-335@1x.png')}}" />
                <img class="subtract-1" src="{{asset('public/auth/img/subtract-336@1x.png')}}" />
                <div class="ellipse-4"></div>
              </div>
            </div>
            <div class="group-63">
              <div class="group-1">
                <div class="overlap-group-2">
                  <div class="sign-in-to">Bienvenue</div>
                  <div class="lorem-ipsum-is-simply">sur votre espace collaboratif</div>
                </div>
              </div>
            </div>
            <div class="groupe-2">
              <div class="overlap-group1">
                <img class="subtract-2" src="{{asset('public/auth/img/subtract-341@1x.png')}}" />
                <img class="subtract-3" src="{{asset('public/auth/img/subtract-342@1x.png')}}" />
                <div class="ellipse-4-1"></div>
              </div>
            </div>
            <div class="group-container-1">
              <div class="groupe-4">
                <div class="trac-container-1">
                  <img class="trac-1" src="{{asset('public/auth/img/trac--1@1x.png')}}" />
                  <img class="trac-2" src="{{asset('public/auth/img/trac--2@1x.png')}}" />
                  <img class="trac-3" src="{{asset('public/auth/img/trac--3@1x.png')}}" />
                  <img class="trac-5" src="{{asset('public/auth/img/trac--5@1x.png')}}" />
                  <img class="trac-6" src="{{asset('public/auth/img/trac--6@1x.png')}}" />
                </div>
                <img class="trac-4" src="{{asset('public/auth/img/trac--4@1x.png')}}" />
              </div>
              <div class="groupe-14">
                <div class="overlap-group2">
                  <img class="trac-8" src="{{asset('public/auth/img/trac--8@1x.png')}}" />
                  <div class="groupe-10">
                    <div class="groupe-9"></div>
                  </div>
                  <div class="groupe-13">
                    <div class="groupe-12"></div>
                  </div>
                </div>
                <div class="overlap-group1-1">
                  <img class="trac-7" src="{{asset('public/auth/img/trac--7@1x.png')}}" />
                  <div class="groupe-7">
                    <div class="groupe-6"></div>
                  </div>
                </div>
              </div>
              <div class="group-container-2">
                <div class="groupe-15"><img class="trac-16" src="{{asset('public/auth/img/trac--16@1x.png')}}" /></div>
                <div class="groupe-16"><img class="trac-18" src="{{asset('public/auth/img/trac--18@1x.png')}}" /></div>
                <div class="overlap-group2-1">
                  <img class="trac-19" src="{{asset('public/auth/img/trac--19@1x.png')}}" />
                  <div class="groupe-19">
                    <div class="overlap-group-3">
                      <div class="groupe-18"></div>
                    </div>
                  </div>
                  <div class="groupe-24">
                    <div class="overlap-group1-2">
                      <div class="groupe-23"></div>
                    </div>
                  </div>
                  <img class="trac-26" src="{{asset('public/auth/img/trac--26@1x.png')}}" />
                  <img class="trac-27" src="{{asset('public/auth/img/trac--27@1x.png')}}" />
                  <img class="trac-28" src="{{asset('public/auth/img/trac--28@1x.png')}}" />
                  <img class="trac-29" src="{{asset('public/auth/img/trac--29@1x.png')}}" />
                  <img class="trac-30" src="{{asset('public/auth/img/trac--30@1x.png')}}" />
                  <img class="trac-31" src="{{asset('public/auth/img/trac--31@1x.png')}}" />
                  <img class="trac-32" src="{{asset('public/auth/img/trac--32@1x.png')}}" />
                  <img class="trac-33" src="{{asset('public/auth/img/trac--33@1x.png')}}" />
                  <div class="groupe-25"></div>
                  <img class="trac-35" src="{{asset('public/auth/img/trac--35@1x.png')}}" />
                  <img class="trac-36" src="{{asset('public/auth/img/trac--36@1x.png')}}" />
                </div>
                <div class="overlap-group3">
                  <div class="groupe-27"></div>
                  <div class="groupe-28"></div>
                  <img class="trac-39" src="{{asset('public/auth/img/trac--39@1x.png')}}" />
                  <div class="groupe-29"></div>
                  <div class="groupe-30"></div>
                  <div class="groupe-43">
                    <div class="groupe-42">
                      <div class="groupe-31"></div>
                      <div class="groupe-32"></div>
                      <div class="groupe-33"></div>
                      <div class="groupe-34"></div>
                      <div class="groupe-35"></div>
                      <div class="groupe-36"></div>
                      <div class="groupe-37"></div>
                      <div class="groupe-38"></div>
                      <div class="groupe-39"></div>
                      <div class="groupe-40"></div>
                      <div class="groupe-41"></div>
                    </div>
                  </div>
                  <div class="groupe-46">
                    <div class="groupe-45"></div>
                    <div class="groupe-44"></div>
                  </div>
                </div>
                <div class="overlap-group4">
                  <img class="trac-56" src="{{asset('public/auth/img/trac--56@1x.png')}}" />
                  <img class="trac-57" src="{{asset('public/auth/img/trac--57@1x.png')}}" />
                  <img class="trac-58" src="{{asset('public/auth/img/trac--58@1x.png')}}" />
                  <div class="groupe-48"></div>
                </div>
              </div>
              <div class="group-container-3">
                <div class="groupe-53">
                  <div class="overlap-group-4">
                    <img class="trac-61" src="{{asset('public/auth/img/trac--61@1x.png')}}" />
                    <div class="groupe-52"></div>
                  </div>
                </div>
                <div class="groupe-57">
                  <div class="overlap-group1-3">
                    <img class="trac-64" src="{{asset('public/auth/img/trac--64@1x.png')}}" />
                    <div class="groupe-56"></div>
                  </div>
                </div>
                <div class="groupe-64">
                  <div class="groupe-62"></div>
                  <div class="overlap-group2-2">
                    <img class="trac-67" src="{{asset('public/auth/img/trac--67@1x.png')}}" />
                    <div class="groupe-63"></div>
                  </div>
                  <div class="overlap-group3-1">
                    <div class="groupe-61"></div>
                  </div>
                </div>
                <div class="overlap-group4-1">
                  <img class="trac-72" src="{{asset('public/auth/img/trac--72@1x.png')}}" />
                  <div class="groupe-67"></div>
                  <img class="trac-74" src="{{asset('public/auth/img/trac--74@1x.png')}}" />
                  <img class="trac-75" src="{{asset('public/auth/img/trac--75@1x.png')}}" />
                </div>
                <div class="overlap-group5">
                  <img class="trac-76" src="{{asset('public/auth/img/trac--76@1x.png')}}" />
                  <div class="groupe-71">
                    <div class="overlap-group-5">
                      <div class="groupe-70"></div>
                    </div>
                  </div>
                  <div class="groupe-76">
                    <div class="overlap-group1-4">
                      <div class="groupe-75"></div>
                    </div>
                  </div>
                  <img class="trac-83" src="{{asset('public/auth/img/trac--83@1x.png')}}" />
                  <img class="trac-84" src="{{asset('public/auth/img/trac--84@1x.png')}}" />
                  <img class="trac-85" src="{{asset('public/auth/img/trac--85@1x.png')}}" />
                  <img class="trac-86" src="{{asset('public/auth/img/trac--86@1x.png')}}" />
                  <img class="trac-87" src="{{asset('public/auth/img/trac--86@1x.png')}}" />
                  <img class="trac-88" src="{{asset('public/auth/img/trac--88-23@1x.png')}}" />
                  <img class="trac-89" src="{{asset('public/auth/img/trac--89-23@1x.png')}}" />
                  <div class="groupe-77"></div>
                  <img class="trac-91" src="{{asset('public/auth/img/trac--91-23@1x.png')}}" />
                  <div class="groupe-78"></div>
                  <img class="trac-93" src="{{asset('public/auth/img/trac--93-23@1x.png')}}" />
                  <div class="groupe-container-1">
                    <div class="groupe-79"></div>
                    <div class="groupe-80"></div>
                    <div class="groupe-81"></div>
                    <div class="groupe-82"></div>
                    <div class="groupe-83"></div>
                  </div>
                </div>
                <div class="trac-container-2">
                  <img class="trac-99" src="{{asset('public/auth/img/trac--99@1x.png')}}" />
                  <img class="trac-100" src="{{asset('public/auth/img/trac--100@1x.png')}}" />
                  <img class="trac-101" src="{{asset('public/auth/img/trac--101@1x.png')}}" />
                </div>
              </div>
              <div class="overlap-group-container">
                <div class="overlap-group-6">
                  <img class="trac-102" src="{{asset('public/auth/img/trac--102@1x.png')}}" />
                  <img class="groupe-88" src="{{asset('public/auth/img/groupe-88@1x.png')}}" />
                  <img class="trac-127" src="{{asset('public/auth/img/trac--127@1x.png')}}" />
                  <div class="groupe-89"></div>
                  <div class="groupe-90"></div>
                  <div class="groupe-91"></div>
                  <img class="trac-131" src="{{asset('public/auth/img/trac--131@1x.png')}}" />
                  <div class="groupe-92"></div>
                </div>
                <div class="overlap-group3-2">
                  <img class="trac-133" src="{{asset('public/auth/img/trac--133@1x.png')}}" />
                  <img class="trac-134" src="{{asset('public/auth/img/trac--134@1x.png')}}" />
                  <div class="overlap-group2-3">
                    <div class="groupe-96">
                      <div class="overlap-group-7">
                        <div class="groupe-95"></div>
                      </div>
                    </div>
                    <div class="groupe-99">
                      <div class="overlap-group1-5">
                        <div class="groupe-98"></div>
                      </div>
                    </div>
                    <img class="trac-141" src="{{asset('public/auth/img/trac--141@1x.png')}}" />
                    <img class="trac-142" src="{{asset('public/auth/img/trac--142@1x.png')}}" />
                    <img class="trac-143" src="{{asset('public/auth/img/trac--143@1x.png')}}" />
                    <img class="trac-144" src="{{asset('public/auth/img/trac--144@1x.png')}}" />
                    <img class="trac-145" src="{{asset('public/auth/img/trac--144@1x.png')}}" />
                    <img class="trac-146" src="{{asset('public/auth/img/trac--146@1x.png')}}" />
                    <img class="trac-147" src="{{asset('public/auth/img/trac--147@1x.png')}}" />
                    <div class="groupe-100"></div>
                    <img class="trac-149" src="{{asset('public/auth/img/trac--149@1x.png')}}" />
                    <div class="groupe-101"></div>
                  </div>
                  <img class="trac-151" src="{{asset('public/auth/img/trac--151@1x.png')}}" />
                  <img class="trac-152" src="{{asset('public/auth/img/trac--152@1x.png')}}" />
                  <img class="trac-153" src="{{asset('public/auth/img/trac--153@1x.png')}}" />
                  <img class="trac-154" src="{{asset('public/auth/img/trac--154@1x.png')}}" />
                </div>
                <div class="overlap-group4-2">
                  <img class="trac-155" src="{{asset('public/auth/img/trac--155@1x.png')}}" />
                  <div class="groupe-104"></div>
                  <div class="groupe-105"></div>
                  <div class="groupe-106"></div>
                  <div class="overlap-group-8">
                    <img class="trac-159" src="{{asset('public/auth/img/trac--159@1x.png')}}" />
                    <div class="groupe-107"></div>
                    <img class="trac-161" src="{{asset('public/auth/img/trac--161@1x.png')}}" />
                  </div>
                  <img class="trac-162" src="{{asset('public/auth/img/trac--162@1x.png')}}" />
                </div>
              </div>
              <div class="group-container-4">
                <div class="groupe-149">
                  <div class="groupe-148">
                    <div class="groupe-147">
                      <div class="groupe-container-2">
                        <div class="groupe-1">
                          <div class="groupe-132"></div>
                          <div class="groupe-1-1"></div>
                        </div>
                        <div class="groupe-1-2">
                          <div class="groupe-1-3"></div>
                          <div class="groupe-136"></div>
                        </div>
                      </div>
                      <div class="flex-col">
                        <div class="groupe-container-3">
                          <div class="groupe-146">
                            <div class="groupe-145">
                              <div class="groupe-container">
                                <div class="groupe-1">
                                  <div class="groupe-1-4"></div>
                                  <div class="groupe-140"></div>
                                </div>
                                <div class="groupe-1-2">
                                  <div class="groupe-1-5"></div>
                                  <div class="groupe-1-5"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="groupe-130"></div>
                        </div>
                        <div class="groupe-131"></div>
                      </div>
                    </div>
                  </div>
                  <div class="groupe-129">
                    <div class="groupe-128">
                      <div class="groupe-container-4">
                        <div class="groupe-111"></div>
                        <div class="groupe-127">
                          <div class="groupe-126">
                            <div class="groupe-container">
                              <div class="groupe-1">
                                <div class="groupe-120"></div>
                                <div class="groupe-121"></div>
                              </div>
                              <div class="groupe-1-2">
                                <div class="groupe-124"></div>
                                <div class="groupe-123"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="groupe-112"></div>
                      </div>
                      <div class="groupe-container-5">
                        <div class="groupe-1">
                          <div class="groupe-1-4"></div>
                          <div class="groupe-1-1"></div>
                        </div>
                        <div class="groupe-1-2">
                          <div class="groupe-1-5"></div>
                          <div class="groupe-1-3"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="groupe-container-6">
                  <div class="groupe-152">
                    <div class="groupe-150"></div>
                    <img class="groupe-151" src="{{asset('public/auth/img/groupe-151@1x.png')}}" />
                  </div>
                  <div class="groupe-154">
                    <div class="groupe-153">
                      <div class="trac-container-3">
                        <img class="trac-194" src="{{asset('public/auth/img/trac--194@1x.png')}}" />
                        <img class="trac-195" src="{{asset('public/auth/img/trac--195@1x.png')}}" />
                        <img class="trac-196" src="{{asset('public/auth/img/trac--196@1x.png')}}" />
                        <img class="trac-197" src="{{asset('public/auth/img/trac--197@1x.png')}}" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="groupe-157"><img class="trac-199" src="{{asset('public/auth//trac--199@1x.png')}}" /></div>
              <div class="overlap-group10">
                <img class="trac-200" src="{{asset('public/auth/img/trac--200@1x.png')}}" />
                <div class="rectangle-1"></div>
                <div class="ellipse-1"></div>
                <img class="trac-201" src="{{asset('public/auth/img/trac--201@1x.png')}}" />
              </div>
            </div>
          </div>
          <div class="logo">
            <div class="groupe-1-6">
              <div class="overlap-group-9">
                <img class="subtract-4" src="{{asset('public/auth/img/subtract-339@1x.png')}}" />
                <img class="subtract-5" src="{{asset('public/auth/img/subtract-340@1x.png')}}" />
                <div class="ellipse-4-2"></div>
              </div>
            </div>
            <div class="groupe-3-1">
              <div class="insidepro comfortaa-bold-eternity-40px">
                <span class="comfortaa-bold-eternity-40px">inside</span><span class="span1">.</span
                ><span class="comfortaa-bold-eternity-40px">pro</span>
              </div>
              <div class="by-propulse-group">BY PROPULSE GROUP</div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.querySelector("#togglePassword");

  togglePassword.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the eye / eye slash icon
    this.classList.toggle("bi-eye");
  });
});
        window.addEventListener("DOMContentLoaded", function () {
  const togglePasswordConf = document.querySelector("#togglePasswordConf");

  togglePasswordConf.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
      password_conf.getAttribute("type") === "password" ? "text" : "password";
    password_conf.setAttribute("type", type);
    // toggle the eye / eye slash icon
    this.classList.toggle("bi-eye");
  });
});
    </script>
  </body>
</html>
        
@endsection