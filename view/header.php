<html>
<head>
    <title> 1er projet php : projet toto </title>
  <!-- CDN bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Menu -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Projet TOTO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Toutes les sessions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list.php">Tout les étudiants</a>
      </li>
      <?php if(!empty($_SESSION["ID"]) && $_SESSION["Role"] == 'admin') : ?>  <!--on test d'abord si l'utilisateur est connecté et ensuite si il est admin -->
      <li class="nav-item">
        <a class="nav-link" href="add.php">Ajout d'un étudiant</a>
      </li>
      <?php else: ?>
      <!-- On n'affiche pas l'onglet si ce n'est pas un admin -->
      <?php endif; ?>
      <li class="nav-item">
            <a class="nav-link" href="upload.php">Upload</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="sign_up.php">Sign up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sign_in.php">Sign in</a>
      </li>
      <?php if (!empty($_SESSION["ID"])) : ?>
      <a class="btn btn-danger" type="submit" href="disconnect.php"> Déconnexion</a>
      <?php endif; ?>
      <form method="get" action="list.php" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="search" <?php if(!empty ($search))
      echo $search  ?>/>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
      </form>
      <?php if(!empty($_SESSION["ID"])) : ?>  <!-- on vérifie si l'utilisateur est connecté -->
       <?php echo 'UserID :' .$_SESSION["ID"]; ?>  <!-- on affiche l'id de l'utilisateur -->
      <?php endif; ?>
  </div>
</nav>
