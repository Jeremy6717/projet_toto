<form action="" method="post" enctype="multipart/form-data" class="form">
      <fieldset>
        <input type="hidden" name="submitFile" value="1"/>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name=emailInscription id="inputEmail4" placeholder="Email" value="<?php if(isset($_POST['emailInscription'])) { echo htmlentities($_POST['emailInscription']);}?>"> <!-- Grâce au PHP dans value, les valeurs rentrées reste et ne disparraissent pas en cas d'erreur -->
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name=passwordInscription1 id="inputPassword4" placeholder="Password" value= "<?php if(isset($_POST['passwordInscription1'])) { echo htmlentities($_POST['passwordInscription1']);}?>" >
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Confirm password</label>
            <input type="password" class="form-control" name=passwordInscription2 id="inputPassword5" placeholder="Confirm password" value="<?php if(isset($_POST['passwordInscription2'])) { echo htmlentities($_POST['passwordInscription2']);}?>" >
          </div>
        </div>
         <button type="submit" class="btn btn-primary">S'inscrire</button>
      </fieldset>
 </form>
