<?php

require_once '../vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
$loader = new FilesystemLoader('../template');

$twig = new Environment($loader);
echo $twig->render('demo.html.twig');
