<?php
// fra formen
if ($_SERVER["REQUEST_METHOD"] != "POST")
if (empty($_POST["classcode_input"])) {print "Nope";}
{
  return;
}

$filename="student.txt";
$fileaction="r";
$matchcount =0;

$file = fopen($filename,$fileaction);

while ( $linefromfile = fgets($file))
{
$linefromfile = trim($linefromfile);
/*
if (empty($linefromfile)) 
{
  continue;
}
*/

$linefromfile = explode(";", $linefromfile);
// classcode_input is the id of the input text field from the html page

//if (!empty($_POST['classcode_input'])) {
if ($_POST['classcode_input'] != $linefromfile[3]) {
continue;
}
//}
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