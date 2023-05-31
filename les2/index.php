
<?php
require_once __DIR__ . '/vendor/autoload.php'; // Twig autoload

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$adres = array(
    'titel' => 'Mijn Adres',
    'straat' => 'Voorbeeldstraat 123',
    'postcode' => '1234 AB',
    'plaats' => 'Voorbeeldstad',
    'land' => 'Voorbeeldland'
);

echo $twig->render('adres.twig', ['adres' => $adres]);
?>
