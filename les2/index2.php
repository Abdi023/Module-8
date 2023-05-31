<?php
require_once __DIR__ . '/vendor/autoload.php'; // Twig autoload

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$users = array(
    array('username' => 'John'),
    array('username' => 'Jane'),
    array('username' => 'Alex')
);

echo $twig->render('loop.twig', ['users' => $users]);
?>
