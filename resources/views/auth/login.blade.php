@extends('layouts.auth_template')

@section('content')

 <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="se-connecter" />
    <div class="container-center-horizontal">
      <form class="se-connecter screen" name="form5" action="{{ route('login') }}" method="post">
        @csrf
        <div class="overlap-group12">
          <div class="overlap-group10">
            <div class="rectangle"></div>
            <div class="group-61">
              <div class="sign-in">Connexion</div>
              <div class="group-49"><div class="welcome-to-lorem">à votre dashbord</div></div>
              	@include('flashmessage')
              <div class="group-53">
                <div class="group-50"><div class="content-de-vour-revoir">Content de vous revoir</div></div>
                <div class="overlap-group">
                  <img class="icon-awesome-info-circle" src="{{asset('auth/img/icon-awesome-info-circle@1x.png')}}" />
                </div>
                <div class="group-51">
                  <img class="icon-awesome-question-circle" src="{{asset('auth/img/icon-awesome-question-circle@1x.png')}}" />
                </div>
              </div>
              <div class="groupe-929">
                <div class="group-54">
                  <div class="email poppins-normal-black-16px">Entrez votre email professionnelle</div>
                  <input
                    class="rectangle-17"
                    name="email"
                    placeholder="Adresse électronique entreprise"
                    type="email"
                    required
                  />
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
              <div class="group-55">
                <p class="password poppins-normal-black-16px">Entrez votre mot de passe</p>
                <input
                  class="rectangle-17-1"
                  name="password"
                  placeholder="Mot de Passe"
                  type="password"
                  required
                />
                <!-- validation errors messages -->
                      <div class="errors-msgs">
                        	@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
              </div>
              <div class="flex-row poppins-normal-cioccolato-13px">
                <input class="icon-awesome-check-square" type="checkbox" name="" id="">
                <div class="garder-connect" style="padding-top: 5px;">Gardez-moi connecté</div>
                
                <a href="#" class="mot-pass-oubli" style="display: inline-block!important;color: #54280a;">Mot de passe oublié?</a>
              </div>
                <div class="group-56">
                  <div class="overlap-group1">
                      <button type="submit" class="rectangle-18" style="color: #fff;font-size: 25px;border: none;">
                        <i class="fa-solid fa-unlock" style="font-size: 1.3rem !important;color: #fff !important;"></i>
                        Se connecter
                      </button>
                  </div></div>
            </div>
            <img class="x80604" src="{{asset('auth/img/80604@1x.png')}}" />
          </div>
          <div class="group-container-1">
            <div class="groupe-3-2">
              <div class="overlap-group-1">
                <img class="subtract" src="{{asset('auth/img/subtract-335@1x.png')}}" />
                <img class="subtract-1" src="{{asset('auth/img/subtract-344@1x.png')}}" />
                <div class="ellipse-4"></div>
              </div>
            </div>
            <div class="groupe-2-1">
              <div class="overlap-group2">
                <img class="subtract-2" src="{{asset('auth/img/subtract-341@1x.png')}}" />
                <img class="subtract-3" src="{{asset('auth/img/subtract-342@1x.png')}}" />
                <div class="ellipse-4-1"></div>
              </div>
            </div>
            <div class="overlap-group9">
              <div class="background_-complete">
                <div class="group-container-2">
                  <div class="groupe-container">
                    <div class="groupe-184"></div>
                    <div class="groupe-186"></div>
                    <div class="groupe-188"></div>
                    <div class="groupe-190"></div>
                    <div class="groupe-192"></div>
                    <div class="groupe-194"></div>
                    <div class="groupe-196"></div>
                    <div class="groupe-198"></div>
                  </div>
                  <div class="groupe-220">
                    <div class="groupe-204"></div>
                    <div class="groupe-207"></div>
                    <div class="groupe-210"></div>
                    <div class="groupe-213"></div>
                    <div class="groupe-216"></div>
                    <div class="groupe-219"></div>
                  </div>
                </div>
                <div class="groupe-container-1">
                  <div class="groupe-175">
                    <div class="groupe-container-2">
                      <div class="groupe-160"></div>
                      <div class="groupe-161"></div>
                      <div class="groupe-162"></div>
                      <div class="groupe-163"></div>
                      <div class="groupe-164"></div>
                      <div class="groupe-165">
                        <div class="rectangle-7"></div>
                      </div>
                      <div class="groupe-166"></div>
                      <div class="groupe-167"></div>
                      <div class="groupe-168"></div>
                      <div class="groupe-169"></div>
                    </div>
                    <div class="groupe-container-3">
                      <div class="groupe-170"></div>
                      <div class="groupe-171"></div>
                      <div class="groupe-172"></div>
                      <div class="groupe-174"></div>
                    </div>
                    <div class="groupe-173"></div>
                  </div>
                  <div class="groupe-183">
                    <div class="overlap-group-2">
                      <img class="trac-207" src="{{asset('auth/img/trac--207@1x.png')}}" />
                      <img class="trac-208" src="{{asset('auth/img/trac--208@1x.png')}}" />
                      <img class="trac-209" src="{{asset('auth/img/trac--209@1x.png')}}" />
                      <div class="groupe-176"></div>
                      <div class="groupe-177"></div>
                      <div class="groupe-178"></div>
                    </div>
                    <div class="overlap-group2-1">
                      <img class="trac-213" src="{{asset('auth/img/trac--213@1x.png')}}" />
                      <div class="rectangle-15"></div>
                      <img class="trac-214" src="{{asset('auth/img/trac--214@1x.png')}}" />
                      <div class="groupe-180"></div>
                      <div class="groupe-181"></div>
                    </div>
                    <div class="overlap-group3">
                      <img class="trac-215" src="{{asset('auth/img/trac--215@1x.png')}}" />
                      <div class="groupe-182"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="background_-simple"></div>
              <div class="floor"></div>
              <div class="character_1">
                <div class="groupe-462">
                  <div class="group-container-3">
                    <div class="overlap-group7">
                      <div class="group-container-4">
                        <div class="groupe-container-4">
                          <div class="groupe-229">
                            <div class="groupe-228">
                              <div class="groupe-container-5">
                                <div class="groupe-223"></div>
                                <div class="groupe"></div>
                                <div class="groupe-227"></div>
                              </div>
                            </div>
                          </div>
                          <div class="groupe-230"></div>
                          <div class="groupe-231"></div>
                          <div class="groupe-232"></div>
                          <div class="groupe-234"></div>
                        </div>
                        <div class="groupe-236"></div>
                        <div class="groupe-237"></div>
                        <div class="groupe-238"></div>
                      </div>
                      <div class="overlap-group3-1">
                        <img class="trac-245" src="{{asset('auth/img/trac--245@1x.png')}}" />
                        <img class="trac-246" src="{{asset('auth/img/trac--246@1x.png')}}" />
                        <div class="groupe-240"></div>
                        <div class="groupe-241"></div>
                        <div class="groupe-242"></div>
                        <div class="groupe-243"></div>
                      </div>
                      <div class="groupe-container-6">
                        <div class="groupe-246"></div>
                        <div class="groupe-249"></div>
                        <div class="groupe-250"></div>
                        <div class="groupe-251"></div>
                      </div>
                      <div class="group-container-5">
                        <div class="overlap-group1-1">
                          <div class="groupe-320">
                            <div class="groupe-319">
                              <div class="groupe-container-7">
                                <div class="groupe-259">
                                  <div class="groupe-258"></div>
                                </div>
                                <div class="groupe-262"></div>
                                <div class="groupe-266"></div>
                                <div class="groupe-270"></div>
                                <div class="groupe-274"></div>
                                <div class="groupe-278"></div>
                                <div class="groupe-282"></div>
                                <div class="groupe-286"></div>
                                <div class="groupe-290"></div>
                                <div class="groupe-294"></div>
                                <div class="groupe-298"></div>
                                <div class="groupe-302"></div>
                                <div class="groupe-3"></div>
                                <div class="groupe-310"></div>
                                <div class="groupe-3-1"></div>
                                <div class="groupe-318"></div>
                              </div>
                            </div>
                          </div>
                          <img class="trac-2" src="{{asset('auth/img/trac--272@1x.png')}}" />
                        </div>
                        <div class="overlap-group2-2">
                          <div class="groupe-389">
                            <div class="groupe-388">
                              <div class="groupe-container-8">
                                <div class="groupe-328">
                                  <div class="groupe-327"></div>
                                </div>
                                <div class="groupe-331"></div>
                                <div class="groupe-335"></div>
                                <div class="groupe-339"></div>
                                <div class="groupe-343"></div>
                                <div class="groupe-347"></div>
                                <div class="groupe-351"></div>
                                <div class="groupe-355"></div>
                                <div class="groupe-359"></div>
                                <div class="groupe-363"></div>
                                <div class="groupe-367"></div>
                                <div class="groupe-371"></div>
                                <div class="groupe-3"></div>
                                <div class="groupe-379"></div>
                                <div class="groupe-3-1"></div>
                                <div class="groupe-387"></div>
                              </div>
                            </div>
                          </div>
                          <img class="trac-2" src="{{asset('auth/img/trac--290@1x.png')}}" />
                        </div>
                        <div class="groupe-393"></div>
                        <div class="groupe-398">
                          <div class="groupe-397"></div>
                        </div>
                        <div class="groupe-400"></div>
                      </div>
                      <div class="groupe-403"></div>
                      <div class="groupe-405"></div>
                      <div class="groupe-407"></div>
                      <img class="trac-298" src="{{asset('auth/img/trac--298@1x.png')}}" />
                      <div class="groupe-408"></div>
                      <div class="groupe-409"></div>
                      <div class="groupe-410"></div>
                      <div class="groupe-411"></div>
                      <div class="groupe-412"></div>
                      <div class="groupe-413"></div>
                      <div class="group-container-6">
                        <div class="groupe-container-9">
                          <div class="groupe-429">
                            <div class="groupe-428">
                              <div class="groupe-container-10">
                                <div class="groupe-419">
                                  <div class="groupe-418">
                                    <div class="groupe-417"></div>
                                  </div>
                                </div>
                                <div class="groupe-425">
                                  <div class="groupe-424"></div>
                                </div>
                                <div class="groupe-427"></div>
                              </div>
                            </div>
                          </div>
                          <div class="groupe-456">
                            <div class="groupe-455">
                              <div class="groupe-container-11">
                                <div class="groupe-452"></div>
                                <div class="groupe-454"></div>
                              </div>
                              <div class="groupe-450">
                                <div class="groupe-449">
                                  <div class="groupe-448">
                                    <div class="groupe-441">
                                      <div class="groupe-4"></div>
                                      <div class="groupe-437"></div>
                                    </div>
                                    <div class="group-container-7">
                                      <div class="groupe-container-12">
                                        <div class="groupe-435">
                                          <div class="groupe-4"></div>
                                          <div class="groupe-431"></div>
                                        </div>
                                        <div class="groupe-444"></div>
                                      </div>
                                      <div class="groupe-447"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="groupe-458"></div>
                      </div>
                    </div>
                    <div class="groupe-461"></div>
                  </div>
                </div>
              </div>
              <div class="character_3">
                <div class="groupe-653">
                  <div class="overlap-group6">
                    <div class="group-container-8">
                      <div class="groupe-container-13">
                        <div class="groupe-469">
                          <div class="groupe-468">
                            <div class="groupe-container-14">
                              <div class="groupe-463">
                                <div class="rectangle-17-2"></div>
                              </div>
                              <div class="groupe"></div>
                              <div class="groupe-467"></div>
                            </div>
                          </div>
                        </div>
                        <div class="groupe-470"></div>
                        <div class="groupe-471"></div>
                        <div class="groupe-472"></div>
                        <div class="groupe-474"></div>
                      </div>
                      <div class="groupe-476"></div>
                      <div class="groupe-477"></div>
                      <div class="groupe-478"></div>
                    </div>
                    <img class="trac" src="{{asset('auth/img/trac--329@1x.png')}}" />
                    <div class="overlap-group3-2">
                      <div class="groupe-484">
                        <div class="groupe-container-15">
                          <div class="groupe-480"></div>
                          <div class="groupe-482">
                            <div class="groupe-481"></div>
                          </div>
                          <div class="groupe-483"></div>
                        </div>
                      </div>
                      <img class="trac-335" src="{{asset('auth/img/trac--335@1x.png')}}" />
                    </div>
                    <div class="groupe-539">
                      <div class="groupe-538">
                        <div class="groupe-container-16">
                          <div class="groupe-490">
                            <div class="groupe-489"></div>
                          </div>
                          <div class="groupe-492"></div>
                          <div class="groupe-495"></div>
                          <div class="groupe-498"></div>
                          <div class="groupe-501"></div>
                          <div class="groupe-504"></div>
                          <div class="groupe-507"></div>
                          <div class="groupe-510"></div>
                          <div class="groupe-513"></div>
                          <div class="groupe-516"></div>
                          <div class="groupe-519"></div>
                          <div class="groupe-522"></div>
                          <div class="groupe-525"></div>
                          <div class="groupe-528"></div>
                          <div class="groupe-531"></div>
                          <div class="groupe-534"></div>
                          <div class="groupe-537"></div>
                        </div>
                      </div>
                    </div>
                    <div class="groupe-593">
                      <div class="groupe-592">
                        <div class="groupe-container-17">
                          <div class="groupe-544">
                            <div class="groupe-543"></div>
                          </div>
                          <div class="groupe-546"></div>
                          <div class="groupe-549"></div>
                          <div class="groupe-552"></div>
                          <div class="groupe-555"></div>
                          <div class="groupe-558"></div>
                          <div class="groupe-561"></div>
                          <div class="groupe-564"></div>
                          <div class="groupe-567"></div>
                          <div class="groupe-570"></div>
                          <div class="groupe-573"></div>
                          <div class="groupe-576"></div>
                          <div class="groupe-579"></div>
                          <div class="groupe-582"></div>
                          <div class="groupe-585"></div>
                          <div class="groupe-588"></div>
                          <div class="groupe-591"></div>
                        </div>
                      </div>
                    </div>
                    <div class="groupe-594"></div>
                    <div class="groupe-598">
                      <div class="groupe-596"></div>
                      <div class="groupe-597"></div>
                    </div>
                    <div class="group-container-9">
                      <div class="overlap-group-3">
                        <img class="trac-376" src="{{asset('auth/img/trac--376@1x.png')}}" />
                        <img class="trac-377" src="{{asset('auth/img/trac--377@1x.png')}}" />
                        <div class="groupe-599"></div>
                        <div class="groupe-600"></div>
                        <div class="groupe-601"></div>
                        <div class="groupe-602"></div>
                      </div>
                      <div class="groupe-604"></div>
                    </div>
                    <img class="trac-383" src="{{asset('auth/img/trac--383@1x.png')}}" />
                    <div class="overlap-group5">
                      <img class="trac-384" src="{{asset('auth/img/trac--384@1x.png')}}" />
                      <div class="groupe-635">
                        <div class="groupe-634">
                          <div class="overlap-group2-3">
                            <div class="groupe-633">
                              <div class="overlap-group1-2">
                                <img class="trac-387" src="{{asset('auth/img/trac--387@1x.png')}}" />
                                <div class="groupe-632">
                                  <div class="groupe-631">
                                    <div class="groupe-630"></div>
                                    <div class="groupe-628"></div>
                                    <div class="groupe-626">
                                      <div class="groupe-625">
                                        <div class="groupe-624">
                                          <div class="group-container-10">
                                            <div class="groupe-container-18">
                                              <div class="groupe-611">
                                                <div class="groupe-61"></div>
                                                <div class="groupe-607"></div>
                                              </div>
                                              <div class="groupe-620"></div>
                                            </div>
                                            <div class="groupe-623"></div>
                                          </div>
                                          <div class="groupe-617">
                                            <div class="groupe-61"></div>
                                            <div class="groupe-613"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <img class="trac-386" src="{{asset('auth/img/trac--386@1x.png')}}" />
                            </div>
                            <img class="trac-396" src="{{asset('auth/img/trac--396@1x.png')}}" />
                            <img class="trac-397" src="{{asset('auth/img/trac--397@1x.png')}}" />
                          </div>
                        </div>
                      </div>
                      <img class="trac-398" src="{{asset('auth/img/trac--398@1x.png')}}" />
                      <div class="groupe-636"></div>
                      <div class="groupe-637"></div>
                      <div class="groupe-638"></div>
                      <div class="groupe-639"></div>
                      <div class="groupe-640"></div>
                      <div class="groupe-641"></div>
                      <div class="groupe-642"></div>
                      <div class="groupe-643"></div>
                      <div class="groupe-644"></div>
                      <div class="groupe-645"></div>
                      <div class="groupe-646"></div>
                      <div class="groupe-647"></div>
                      <div class="groupe-648"></div>
                    </div>
                    <img class="trac" src="{{asset('auth/img/trac--412@1x.png')}}" />
                    <div class="groupe-652">
                      <div class="groupe-651"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="desk"></div>
              <div class="character_2">
                <div class="groupe-895">
                  <div class="overlap-group4">
                    <img class="trac-416" src="{{asset('auth/img/trac--416@1x.png')}}" />
                    <div class="groupe-704">
                      <div class="groupe-703">
                        <div class="groupe-container-19">
                          <div class="groupe-658">
                            <div class="groupe-657"></div>
                          </div>
                          <div class="groupe-660"></div>
                          <div class="groupe-1"></div>
                          <div class="groupe-2"></div>
                          <div class="groupe-669"></div>
                          <div class="groupe-672"></div>
                          <div class="groupe-5"></div>
                          <div class="groupe-678"></div>
                          <div class="groupe-6"></div>
                          <div class="groupe-684"></div>
                          <div class="groupe-7"></div>
                          <div class="groupe-690"></div>
                          <div class="groupe-8"></div>
                          <div class="groupe-9"></div>
                          <div class="groupe-10"></div>
                          <div class="groupe-11"></div>
                        </div>
                      </div>
                    </div>
                    <img class="trac-434" src="{{asset('auth/img/trac--434@1x.png')}}" />
                    <img class="trac-435" src="{{asset('auth/img/trac--435@1x.png')}}" />
                    <div class="groupe-705"></div>
                    <div class="groupe-706"></div>
                    <div class="groupe-707"></div>
                    <div class="groupe-708"></div>
                    <div class="groupe-709"></div>
                    <div class="groupe-710"></div>
                    <div class="group-container-11">
                      <div class="group">
                        <div class="group">
                          <div class="groupe-712">
                            <div class="groupe-711">
                              <div class="rectangle-18-1"></div>
                            </div>
                          </div>
                          <div class="groupe-714"></div>
                        </div>
                        <div class="groupe-717"></div>
                      </div>
                      <div class="groupe-719"></div>
                      <div class="groupe-721"></div>
                      <div class="groupe-723"></div>
                      <div class="groupe-725"></div>
                      <div class="groupe-727"></div>
                      <div class="groupe-729"></div>
                      <div class="groupe-731"></div>
                      <div class="groupe-733"></div>
                      <div class="groupe-735"></div>
                      <div class="groupe-737"></div>
                      <div class="groupe-739"></div>
                      <div class="groupe-741"></div>
                      <div class="groupe-743"></div>
                      <div class="groupe-745"></div>
                      <div class="groupe-747"></div>
                      <div class="groupe-749"></div>
                      <div class="groupe-751"></div>
                      <div class="groupe-753"></div>
                      <div class="groupe-755"></div>
                      <div class="groupe-757"></div>
                      <div class="groupe-759"></div>
                      <div class="groupe-760"></div>
                      <div class="groupe-761"></div>
                      <div class="groupe-762"></div>
                      <div class="groupe-763"></div>
                    </div>
                    <div class="groupe-772">
                      <div class="groupe-765"></div>
                      <div class="groupe-771">
                        <div class="groupe-container-20">
                          <div class="groupe-768"></div>
                          <div class="groupe-770"></div>
                        </div>
                      </div>
                    </div>
                    <div class="groupe-782">
                      <div class="groupe-781">
                        <div class="groupe-container-21">
                          <div class="groupe-779">
                            <div class="groupe-778">
                              <div class="groupe-777">
                                <div class="groupe-container-22">
                                  <div class="groupe-774"></div>
                                  <div class="groupe-776"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="groupe-780"></div>
                        </div>
                      </div>
                    </div>
                    <div class="groupe-791">
                      <div class="groupe-790">
                        <div class="groupe-container-23">
                          <div class="groupe-787"></div>
                          <div class="groupe-789"></div>
                        </div>
                      </div>
                    </div>
                    <div class="group-container-12">
                      <div class="group-container">
                        <div class="group-container">
                          <div class="groupe-792"></div>
                          <div class="groupe-container-24">
                            <div class="groupe-793"></div>
                            <div class="groupe-794"></div>
                          </div>
                          <div class="groupe-797"></div>
                          <div class="groupe-799"></div>
                        </div>
                        <div class="groupe-802"></div>
                      </div>
                      <div class="groupe-804"></div>
                      <div class="groupe-805"></div>
                      <div class="groupe-806"></div>
                      <div class="groupe-808"></div>
                    </div>
                    <img class="trac-484" src="{{asset('auth/img/trac--484@1x.png')}}" />
                    <img class="trac-485" src="{{asset('auth/img/trac--485@1x.png')}}" />
                    <img class="trac-486" src="{{asset('auth/img/trac--486@1x.png')}}" />
                    <img class="trac-487" src="{{asset('auth/img/trac--487@1x.png')}}" />
                    <div class="groupe-810"></div>
                    <div class="groupe-811"></div>
                    <div class="groupe-812"></div>
                    <div class="groupe-813"></div>
                    <div class="groupe-814"></div>
                    <div class="groupe-815"></div>
                    <div class="groupe-816"></div>
                    <div class="groupe-817"></div>
                    <div class="groupe-818"></div>
                    <div class="groupe-819"></div>
                    <div class="groupe-820"></div>
                    <div class="groupe-871">
                      <div class="groupe-870">
                        <div class="groupe-container-25">
                          <div class="groupe-825">
                            <div class="groupe-824"></div>
                          </div>
                          <div class="groupe-827"></div>
                          <div class="groupe-1"></div>
                          <div class="groupe-2"></div>
                          <div class="groupe-836"></div>
                          <div class="groupe-839"></div>
                          <div class="groupe-5"></div>
                          <div class="groupe-845"></div>
                          <div class="groupe-6"></div>
                          <div class="groupe-851"></div>
                          <div class="groupe-7"></div>
                          <div class="groupe-857"></div>
                          <div class="groupe-8"></div>
                          <div class="groupe-9"></div>
                          <div class="groupe-10"></div>
                          <div class="groupe-11"></div>
                        </div>
                      </div>
                    </div>
                    <div class="groupe-872"></div>
                    <div class="groupe-873"></div>
                    <div class="groupe-874"></div>
                    <div class="groupe-875"></div>
                    <div class="groupe-876"></div>
                    <div class="groupe-877"></div>
                    <div class="groupe-878"></div>
                    <div class="groupe-879"></div>
                    <div class="groupe-880"></div>
                    <div class="groupe-881"></div>
                    <div class="groupe-882"></div>
                    <div class="groupe-883"></div>
                    <div class="groupe-884"></div>
                    <div class="groupe-885"></div>
                    <div class="groupe-886"></div>
                    <div class="groupe-887"></div>
                    <div class="groupe-888"></div>
                    <div class="groupe-889"></div>
                    <div class="groupe-890"></div>
                    <div class="groupe-891"></div>
                    <div class="groupe-892"></div>
                    <div class="groupe-893"></div>
                    <div class="groupe-894"></div>
                  </div>
                </div>
              </div>
              <div class="charts">
                <div class="groupe-910">
                  <div class="overlap-group2-4">
                    <div class="groupe-898">
                      <div class="overlap-group-4">
                        <div class="rectangle-21"></div>
                        <div class="rectangle-22"></div>
                        <div class="rectangle-23"></div>
                        <div class="rectangle-24"></div>
                        <div class="rectangle-25"></div>
                        <div class="rectangle-26"></div>
                        <div class="groupe-896"></div>
                        <div class="groupe-897"></div>
                      </div>
                    </div>
                    <div class="groupe-899"></div>
                    <div class="groupe-901"></div>
                    <img class="trac-544" src="{{asset('auth/img/trac--544@1x.png')}}" />
                    <img class="trac-545" src="{{asset('auth/img/trac--545@1x.png')}}" />
                    <div class="ellipse-6"></div>
                    <img class="trac-555" src="{{asset('auth/img/trac--555@1x.png')}}" />
                  </div>
                  <div class="overlap-group3-3">
                    <div class="groupe-900"></div>
                    <img class="trac-554" src="{{asset('auth/img/trac--554@1x.png')}}" />
                    <div class="ellipse-5"></div>
                  </div>
                  <div class="overlap-group1-3">
                    <div class="rectangle-27"></div>
                    <div class="rectangle-28"></div>
                    <div class="groupe-902"></div>
                    <div class="groupe-903"></div>
                    <div class="groupe-904"></div>
                    <div class="groupe-905"></div>
                    <div class="groupe-906"></div>
                    <div class="groupe-907"></div>
                    <div class="groupe-908"></div>
                  </div>
                  <div class="groupe-909"></div>
                  <div class="rectangle-29"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="logo">
            <div class="groupe-1-1">
              <div class="overlap-group-5">
                <img class="subtract-4" src="{{asset('auth/img/subtract-339@1x.png')}}" />
                <img class="subtract-5" src="{{asset('auth/img/subtract-340@1x.png')}}" />
                <div class="ellipse-4-2"></div>
              </div>
            </div>
            <div class="groupe-3-3">
              <div class="insidepro comfortaa-bold-eternity-40px">
                <span class="comfortaa-bold-eternity-40px">Inside</span><span class="span1">.</span
                ><span class="comfortaa-bold-eternity-40px">pro</span>
              </div>
              <div class="by-propulse-group">BY PROPULSE GROUP</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>

 @endsection