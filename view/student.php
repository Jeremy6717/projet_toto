<div class="list-group">
  <?php foreach ($studentInfo as $index => $info) :?> <!-- On parcour le tableau $studentInfo qui est dans le fichier student.php dans le dossier public -->
  <a href="#" class="list-group-item list-group-item-action active">
    <?php echo $info['stu_firstname'];?> <?php echo $info['stu_lastname'];?>
  </a>
  <a href="#" class="list-group-item ">Nom: <?php echo $info['stu_lastname'];?></a>   <!-- on affiche les résultat (la valeur) de l'index voulu, ici on a nommé la variable $info-->
  <a href="#" class="list-group-item ">Prénom: <?php echo $info['stu_firstname'];?></a>
  <a href="#" class="list-group-item ">Email: <?php echo $info['stu_email'];?></a>
  <a href="#" class="list-group-item ">Date de naissance: <?php echo $info['stu_birthdate'];?></a>
  <a href="#" class="list-group-item ">Age: <?php echo  $age->format('%y');?></a>
  <a href="#" class="list-group-item ">Ville: <?php echo $info['cit_name'];?></a>
  <a href="#" class="list-group-item ">Sympathie: <?php echo $info['stu_friendliness'];?></a>
  <a href="#" class="list-group-item ">Numéro de session: <?php echo $info['ses_number'];?></a>
  <a href="#" class="list-group-item ">Nom de session: <?php echo $info['tra_name'];?></a>
  <?php endforeach ?>
</div>
