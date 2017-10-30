<form>
  <div class="form-row">
    <div class="col">
      <label for="inputEmail4">Prénom</label>
      <input type="text" name="prenom" class="form-control" placeholder="Prénom">
    </div>
    <div class="col">
      <label for="inputEmail4">Nom</label>
      <input type="text" name="nom" class="form-control" placeholder="Nom">
    </div>
  </div>
  <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Date de naissance</label>
      <input type="text" name="dateNaissance" class="form-control" id="inputDateBirth" placeholder= "Date de naissance au format dd/mm/yyyy">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">Session</label>
    <select  name="session" class="form-control">
      <option selected placeholder="sélectionner"> </option>
      <?php foreach ($listeSession as $index => $info) :?> <!-- On parcour le tableau $studentInfo qui est dans le fichier student.php dans le dossier public -->
      <option value="<?php echo $info['ses_id'] ?>"><?php echo $info['ses_number']. $info['tra_name'] ?>></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">sympathie</label>
    <select  name="sympathie"class="form-control">
      <option selected> </option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
    <div class="form-group col-md-4">
      <label for="inputState">Ville</label>
      <select name="ville"class="form-control">
        <option selected> </option>
        <?php foreach ($listeVille as $index => $nom) :?> <!-- On parcour le tableau $studentInfo qui est dans le fichier student.php dans le dossier public -->
        <option ><?php echo $nom['cit_name']?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Envoyer un fichier</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<br>
