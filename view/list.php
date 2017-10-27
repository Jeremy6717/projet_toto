
<!-- Afficher tous les étudiant (récupérés dans public/list.php) dans le tableau (table) -->


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Profile</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($student as $index => $row) :?>   <!--  on fait un foreach pour parcourir le tableau $student qui est sur la page list.php dans le dossier public -->
    <tr>
      <th scope="row"><?php echo $row['stu_id']; ?></th> <!-- j'affiche la valeur de l'index voulue, ici on a nommé une variable $row  -->
      <td><?php echo $row['stu_lastname']; ?> </td>
      <td><?php echo $row['stu_firstname']; ?> </td>
      <td><?php echo $row['stu_birthdate']; ?> </td>
      <td><?php echo $row['stu_email']; ?> </td>
      <td><a  class="btn btn-info" href="student.php?id=<?php echo $row['stu_id']?>"> Détails </a></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- navigation en bas de page (préc-1-2-3-suiv) -->

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="list.php?page=<?php echo $page-1 ?>" >Précédent</a></li> <!-- faire un echo de la variable contenant l'url de la page et lui enlever -1 -->
<!-- <li class="page-item"><a class="page-link" href="list.php?page=1">1</a></li>
    <li class="page-item"><a class="page-link" href="list.php?page=2">2</a></li>
    <li class="page-item"><a class="page-link" href="list.php?page=3">3</a></li> -->
    <li class="page-item"><a class="page-link" href="list.php?page=<?php echo $page+1 ?>" >Suivant</a></li> <!-- faire un echo de la variable contenant l'url de la page et lui ajouter +1 -->
  </ul>
</nav>
