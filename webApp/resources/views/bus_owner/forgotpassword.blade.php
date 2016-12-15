@extends('../layout.master')

@section('logo')
  Login
@endsection
@section('content')

  <div id="login-page" class="row" style="width: 40%; margin-top: 4%">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text"></p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input class="validate" id="email" type="email">
            <label for="email" data-error="wrong" data-success="right" class="">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <a href="forgot-password.html" style="background-color:  #2e6da4" class="btn waves-effect waves-light col s12">Recover my Password</a>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="register.html">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="">Login</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>


@endsection