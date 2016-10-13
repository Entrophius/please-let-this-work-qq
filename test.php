<?php
// validering, altså dvs, sjekk om det er noe i feltet
if ($_SERVER["REQUEST_METHOD"] != "POST") { return;}
if (empty($_POST["classcode_input"])) {print "Nope"; return;}

// en rekke med variabler
$filename="student.txt";
$fileaction="r";
$file = fopen($filename,$fileaction);
$matchcount =0;
$classcode = $_POST["classcode_input"];

while ( $linefromfile = fgets($file))
{

// jeg måtte bruke trim for å få det til å funke, litt usikkert hvorfor
$linefromfile = trim($linefromfile);

// explode linjene fra filen til array, ; som delimiter/skilletegn/breaktegn 
$linefromfile = explode(";", $linefromfile);

// hvis classcode (se input variablen) ikke matcher det siste (0->1->2->3) fortsetter den til den finner det
if ($classcode != $linefromfile[3]) {

// her har den funnet en match og hopper ut av den over, legger til en på match og printer
  $matchcount++;
  print ("First name is $linefromfile[0]. ");
  print ("Last name is $linefromfile[1]. ");
  print ("Username is $linefromfile[2]. ");
  print ("Classcode is $linefromfile[3]");
  print ("<br>");;
}
}

if ($matchcount == 0) { print ("No matches"); }
//var_dump($matchcount);
fclose($file);
// current output: everything in file
?>