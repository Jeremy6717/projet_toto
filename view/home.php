<h1>Listes des sessions</h1>
<h2>Sessions Esch-Belval</h2>
<table>
  <tr>
    <th>Numéro de session</th>
    <th>Nom de la formation</th>
    <th>Date de début</th>
    <th>Date de fin</th>
    <th>lieu</th>
  </tr>
  <?php foreach ($infoSessions as $index => $info) :?> <!-- On parcour le tableau $studentInfo qui est dans le fichier student.php dans le dossier public -->
  <tr>
   <td><?php echo $info['ses_number'];?></td>     <!-- on affiche les résultat (la valeur) de l'index voulu, ici on a nommé la variable $info-->
   <td><?php echo $info['tra_name'];?></td>
   <td><?php echo $info['ses_start_date'];?></td>
   <td><?php echo $info['ses_end_date'];?></td>
   <td><?php echo $info['loc_name'];?></a></td>
  </tr>
  <?php endforeach ?>
</table>

<h2>Sessions Piennes</h2>
