<?php


// Données de configuration
$config= array(
  'DB_HOST' => '',
  'DB_USERNAME' => '',
  'DB_PASSWORD' => '',
  'DB_DATABASE' => ''
);


//inclusion des fichiers
require_once __DIR__.'/db.php';
require_once __DIR__.'/functions.php';

// Inclusion de composer
require_once __DIR__.'/../vendor/autoload.php';

//Social network
//Create a Page instance with the url information
$socialLinksPage = new SocialLinks\Page([
    'url' => 'http://projet-toto.com',
    'title' => 'Projet TOTO',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'icon' => 'http://mypage.com/favicon.png',
    'twitterUser' => '@twitterUser'
]);
