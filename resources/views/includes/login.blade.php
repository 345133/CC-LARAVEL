
<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: antiquewhite;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap" style="background-color: antiquewhite;">
            <div class="col-md-12 col-sm-6" >
              <form method="POST" action="{{ route('login') }}" >
              @csrf
                <div class="form-group" style="border:1px solid black;border-radius:10px;">
                  <input type="email" class="form-control" name="email" placeholder="entrer votre email">
                </div>
                <div class="form-group" style="border:1px solid black;border-radius:10px;">
                  <input type="password" class="form-control" name="password" placeholder="entrer votre Password*">
                </div>
                <div class="form-group checkbox" >
                  <input type="checkbox" id="remember">
               
                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Login" >
                </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p style="color:gray;">vous n'avez pas un compte? <a href="#signupform" data-toggle="modal" data-dismiss="modal" style="color:brown;">enregistrer</a></p>
        <p ><a href="#forgotpassword" data-toggle="modal" data-dismiss="modal" style="color:gray;">vous avez oublier votre mot de passe ?</a></p>
      </div>
    </div>
  </div>
</div>