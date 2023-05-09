<?php
declare(strict_types=1);
class Product {
    public function __construct(private string $naam, private string $beschrijving, private int $prijs){}
    
    public function setName(string $naam): void {
        $this->naam = $naam;
    }
    public function getName(): string {
        return $this->naam;
    }
}



class Bankrekening {
    private $banknummer;
    private $saldo;
    public function __construct($banknummer, $saldo) {
      $this->banknummer = $banknummer;
      $this->saldo = $saldo;
    }
    public function storten($bedrag) {
      $this->saldo += $bedrag;
    }
  
    public function opnemen($bedrag) {
      if ($this->saldo >= $bedrag) {
        $this->saldo -= $bedrag;
        return true;
      } else {
        return false;
      }
    }
  
    public function getSaldo() {
      return $this->saldo;
    }
  }
  
  /*
  Deze class heeft twee properties: $banknummer voor het banknummer 
  en $saldo voor het bedrag dat op de rekening staat. 
  De constructor heeft twee parameters die deze properties initialiseren.
  Er zijn twee methods voor het toevoegen en afhalen van geld van de rekening:
  storten() en opnemen(). De storten() method voegt het gegeven bedrag toe aan het saldo. 
  De opnemen() method haalt het gegeven bedrag van de rekening af, maar alleen als er genoeg saldo is. 
  Als er niet genoeg saldo is, gebeurt er niets en wordt er false teruggegeven. 
  Anders wordt het bedrag afgehaald en wordt true teruggegeven.
  Er is ook een getSaldo() method die het saldo van de rekening teruggeeft
   */
  
  $rekening = new Bankrekening("NL12ABCD3456789", 1000.0);
  $rekening->storten(500.0);
  $rekening->opnemen(200.0);
  echo "Saldo: " . $rekening->getSaldo(); // geeft 1300.0
  $rekening->opnemen(1500.0);
  echo "Saldo: " . $rekening->getSaldo(); // geeft 1300.0
  
    
  
  /*
  De Bankrekening class heeft een constructor om een banknummer en een bedrag in te stellen. 
  De stortGeld method voegt een bedrag toe aan het huidige bedrag. 
  De haalGeldAf method haalt geld van de rekening af, zolang het bedrag niet negatief wordt.
  De BankrekeningPlus class heeft een limiet property waardoor er een negatief saldo kan zijn tot aan deze limiet. 
  De haalGeldAf method is aangepast om dit toe te staan. 
  De berekenBoeteBedrag method berekent het boetebedrag voor negatief staan 
  en de toonStatus method toont de huidige status van de rekening met het boetebedrag en de datum en tijd.
  
  */
  
class BankrekeningPlus extends Bankrekening {
    protected $banknummer;
    protected $saldo;
    protected $limiet = -1000;
    protected $boetePercentage = 5;

    public function haalGeldAf($bedrag) {
        $nieuwSaldo = $this->saldo - $bedrag;
        if ($nieuwSaldo < $this->limiet) {
            return false;
        }
        $this->saldo = $nieuwSaldo;
        return true;
    }

    public function berekenBoeteBedrag() {
        $boeteBedrag = 0;
        if ($this->saldo < 0) { 
            $boeteBedrag = abs($this->saldo) * $this->boetePercentage / 100;
        }
        return $boeteBedrag;
    }

    public function toonStatus() {
        $boeteBedrag = $this->berekenBoeteBedrag();
        $tijd = date('Y-m-d H:i:s');
        $status = "Banknummer: {$this->banknummer}\n";
        $status .= "Saldo: €{$this->saldo}\n";
        $status .= "Boete bedrag: €{$boeteBedrag}\n";
        $status .= "Datum en tijd: {$tijd}\n";
        return $status;
    }
}

$rekening = new BankrekeningPlus("NL12ABCD3456789", 1000.0);
$rekening->storten(500.0);
$rekening->opnemen(200.0);
echo $rekening->toonStatus(); // geeft de status als een string
$rekening->opnemen(1500.0);
echo $rekening->toonStatus(); // geeft de status als een string


  
  
  /*
  Het is niet nodig om properties voor naam, beschrijving en prijs aan te maken 
  omdat ze al in de constructor worden aangemaakt als private properties met behulp van de shorthand syntax. 
  Dit is een kenmerk van PHP 7 en hoger, waarbij de properties direct in de constructor kunnen worden gedefinieerd. 
  Het is daarom niet nodig om expliciet properties voor deze waarden aan te maken.  
  
  
  */


?>
  
























 


?>