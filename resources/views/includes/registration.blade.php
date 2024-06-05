<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: rgb(120, 75, 17);">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="POST" action="{{ route('register') }}">
              @csrf
                <div class="form-group" style="width: 190px;border-radius:20px;background-color:beige;">
                  <input type="text" class="form-control" name="name" placeholder="entrer votre nom" required="required">
                </div>
                      <div class="form-group" style="width: 240px;border-radius:20px;background-color:beige;">
                  <input type="text" class="form-control" name="number" placeholder="entrer votre numero telephone" maxlength="10" required="required">
                </div>
                <div class="form-group" style="width: 190px;border-radius:20px;background-color:beige;">
                  <input type="email" class="form-control" name="email" id="email" placeholder="entrer votre email" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span>
                </div>
                <div class="form-group" style="width: 220px;border-radius:20px;background-color:beige;">
                  <input type="password" class="form-control" name="password" placeholder="entrer votre mot de passe" required="required">
                </div>
                <div class="form-group" style="width: 240px;border-radius:20px;background-color:beige;">
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmer votre mot de passe" required="required">
                </div>
                <div class="form-group" style="width: 190px;border-radius:20px;background-color:beige;">
                  <input type="text" class="form-control" name="city" placeholder="entrer votre ville" required="required">
                </div>
                <div class="form-group checkbox">

                </div>
                <div class="form-group" style="width: 70px;border-radius:20px;background-color:gray;">
                  <input type="submit" value="enregistrer" name="signup" id="submit" >
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
