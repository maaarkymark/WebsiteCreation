<?php
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

echo $twig->render('contacts.html', array('body_class' => 'contactspage'));