<?php
// validering, altså dvs, sjekk om det er noe i feltet, øverste hindrer at man møter på valideringsprinten med en gang
if ($_SERVER["REQUEST_METHOD"] != "POST") { return;}
if ((empty($_POST["klassekode"]) || (empty($_POST["klassenavn"])))
  {
  print ("Du må fylle inn alle felt"); 
  return;
  }

// error: syntax error, unexcpected { on line 5

//variabler
$klassekode=$_POST ["klassekode"];
$klassenavn=$_POST ["klassenavn"];

    /*if (!$klassekode ||!$klassenavn)
    {
        print ("Vennligst fyll ut begge felt!");
    }
    else
    {*/
        $filnavn="klasse.txt";
        $filoperasjon="a";

        $linje=$klassekode . ";" . $klassenavn . PHP_EOL;

        $fil = fopen($filnavn,$filoperasjon);

        fwrite ($fil,$linje);

        fclose ($fil);

        print ("Klassen $klassenavn med klassekoden $klassekode er registrert");
   // }

?>