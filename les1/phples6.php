<?php
$voornamen = array("Yusuf", "Ali", "Ahmet", "Abdi","Simon");

// functie die de positie van jouw naam in de array zoekt.
//De array_search functie zoekt de index van de opgegeven waarde in de array 
//en geeft false terug als de waarde niet gevonden is. We gebruiken array_map 
//om alle elementen in de array naar kleine letters te converteren en
// vergelijken de gezochte naam ook in kleine letters. Hierdoor kan de functie met zowel hoofdletters als kleine letters omgaan.
function zoek_naam($naam, $namen_array) {
    $index = array_search(strtolower($naam), array_map('strtolower', $namen_array));
    return $index !== false ? $index : -1;
}

$naam = "Yusuf";
$index = zoek_naam($naam, $voornamen);
echo "De naam $naam staat op positie $index in de array.\n";

$naam = "Ahmet";
$index = zoek_naam($naam, $voornamen);
echo "De naam $naam staat op positie $index in de array.\n";

$naam = "Abdi";
$index = zoek_naam($naam, $voornamen);
echo "De naam $naam staat op positie $index in de array.\n";

$naam = "Simon";
$index = zoek_naam($naam, $voornamen);
echo "De naam $naam staat op positie $index in de array.\n";
