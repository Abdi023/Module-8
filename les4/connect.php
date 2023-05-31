<?php
require_once __DIR__ . '/vendor/autoload.php'; // Twig autoload


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Verbinding maken met de database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'les4';

$conn = new mysqli($servername, $username, $password, $dbname);

// Controleren op fouten bij het maken van de verbinding
if ($conn->connect_error) {
    die('Verbinding mislukt: ' . $conn->connect_error);
}

$sql = "SELECT * FROM persoon";
$result = $conn->query($sql);

$personen = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['leeftijd'] = berekenLeeftijd($row['geboortedatum']);
        $personen[] = $row;
    }
}

function berekenLeeftijd($geboortedatum) {
    $geboortedatum = new DateTime($geboortedatum);
    $huidigeDatum = new DateTime();
    $leeftijd = $huidigeDatum->diff($geboortedatum)->y;
    return $leeftijd;
}

// Renderen van het Twig-sjabloon en doorgeven van de gegevens
echo $twig->render('index.twig', ['persoon' => $personen]);

// Verbinding met de database sluiten
$conn->close();
?>
