
<?php
  //Affichage de l'heure actuelle
  $date = new DateTime();
  echo $date->format('Y-m-d H:i:s');
  ?>

  <p>© 2017 | Tous droits réservés</p>
  <br>
  <a href="<?= $socialLinksPage->facebook->shareUrl ?>">Facebook</a>  <!-- utilisation du gestionnaire de dépendances Composer avec un package social link de Packagist  -->
  <a href="<?= $socialLinksPage->twitter->shareUrl ?>"> | Twitter</a>
  <a href="<?= $socialLinksPage->Linkedin->shareUrl ?>"> | Linkedin</a>
  </footer>
</html>
