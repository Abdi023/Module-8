<?php

//functie die controleert of de invoer een string of een array is
function is_array_or_string($input) {
    if (is_array($input)) {
      return "Input is an array";
    } else if (is_string($input)) {
      return "Input is a string";
    } else {
      return "Input is not a string or an array";
    }
  }

// De functie begint met het controleren of de invoer een array is met behulp van de is_array-functie. Als dat het geval is, wordt de functie keer_array_om aangeroepen om de array in omgekeerde volgorde weer te geven. Als de invoer een string is, wordt de functie keer_om aangeroepen om de string in omgekeerde volgorde weer te geven. Als de invoer geen string of array is, wordt de string "Input is not a string or an array" geretourneerd.
function keer_om_input($input) {
    if (is_array($input)) {
      return keer_array_om($input);
    } else if (is_string($input)) {
      return keer_om($input);
    } else {
      return "Input is not a string or an array";
    }
  }

  function keer_array_om($array) {
    return array_reverse($array);
  }

// een PHP-functie die alle hoofdletters in een string omzet naar kleine letters en alle kleine letters naar hoofdletters.
function reverse_case($string) {
  return strtr($string, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
}

//De strrev-functie keert de volgorde van de karakters in de string om, waardoor de functie de string in omgekeerde volgorde kan weergeven.
function keer_om($string) {
  return strrev($string);
}
?>

  