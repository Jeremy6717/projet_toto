<?php if (!empty($successList)) : ?>
<div class="alert alert-success">
	<?= join('<br>', $successList); ?>
</div>
<?php endif; ?>


<form action="" method="post" enctype="multipart/form-data" class="form">
      <fieldset>
        <input type="hidden" name="submitFile" value="1"/>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name=emailLogin id="inputEmail4" placeholder="Email" value="<?php if(isset($_POST['emailLogin'])) { echo htmlentities($_POST['emailLogin']);}?>"> <!-- Grâce au PHP dans value, les valeurs rentrées reste et ne disparraissent pas en cas d'erreur -->
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" name=passwordLogin id="inputPassword4" placeholder="Password" value= "<?php if(isset($_POST['passwordLogin'])) { echo htmlentities($_POST['passwordLogin']);}?>" >
          </div>
        </div>
         <button type="submit" class="btn btn-primary">Se connecter</button>
	   <br>
	   </br>
	   <a type="submit" class="btn btn-secondary" href="forgotPassword.php">Mot de passe oublié</a>
      </fieldset>
 </form>
