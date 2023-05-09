<?php
//Als je het PHP.INI bestand niet mag wijzigen en je alleen in de development omgeving foutmeldingen op het scherm wilt zien, kun je de foutmeldingen inschakelen via de PHP-code met behulp van de volgende regels
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Om foutmeldingen in het logbestand 'application_errors.log' te loggen, kun je de volgende code gebruiken.
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/application_errors.log');
