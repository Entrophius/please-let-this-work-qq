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

// trim
$linefromfile = trim($linefromfile);

// explode linjene fra filen til array, ; som delimiter/skilletegn/breaktegn 
$linefromfile = explode(";", $linefromfile);

if ($classcode != $linefromfile[3]) {
continue;
}

  $matchcount++;
  print ("First name is $linefromfile[0]. ");
  print ("Last name is $linefromfile[1]. ");
  print ("Username is $linefromfile[2]. ");
  print ("Classcode is $linefromfile[3]");
  print ("<br>");
}
if ($matchcount == 0) { print ("No matches"); }
//var_dump($matchcount);
fclose($file);
?>