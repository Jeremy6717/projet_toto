
<!-- Afficher tous les étudiant (récupérés dans public/list.php) dans le tableau (table) -->


<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Email</th>
      <th scope="col">Date de naissance</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($student as $index => $row) ?>
      <th scope="row"><?php echo $row['stu_id']; ?></th>
      <td><?php echo $row['stu_lastname']; ?> </td>
      <td><?php echo $row['stu_firstname']; ?> </td>
      <td><?php echo $row['stu_birthdate']; ?> </td>
      <td><?php echo $row['stu_email']; ?> </td>
    </tr>
  </tbody>
</table>
<? }
$req->closeCursor();
?>
