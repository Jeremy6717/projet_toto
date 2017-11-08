<?php

//inclusion du fichier config
require_once __DIR__.'/../inc/config.php';




session_destroy();


// redirige vers la home
header('Location: index.php');
  exit();
