<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
@extends('layouts.auth_template')
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Réinitialiser le mot de passe</div>
                  <div class="card-body">
  
                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Définir un nouveau mot de passe</label>
                              <div class="col-md-6" style="display: inline-flex;">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                 <i class="bi bi-eye-slash" id="togglePassword" style="position: relative;/*! bottom: 0%; */margin-left: 2%;font-size: 29px;padding: 10px 0px 10px 0px;"></i>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer le mot de passe</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Réinitialiser le mot de passe
                              </button>
                          </div>
                      </form>
                        <a href="{{route('login')}}"style="float: right;margin-right: 22px;text-decoration: none;">Connexion</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
<style>
  .form-group{
      margin-bottom: 20px;
  }  
  .offset-md-4 {
  margin-left: 48.333%;
}
</style>
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
    </script>
@endsection