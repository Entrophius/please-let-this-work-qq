<?php
$filename="student.txt";
$fileaction="r";

$file = fopen($filename,$fileaction);

var_dump($_POST);

while ( $linefromfile = fgets($file))
{

$linefromfile = trim($linefromfile);
if (empty($linefromfile)) {continue; }
// classcode_input is the id of the input text field from the html page

if (!empty($_POST['classcode_input'])) {
if ($_POST['classcode_input'] != $linefromfile[3]) {
continue;
}
}

  print ("First name is $linefromfile[0]. ");
  print ("Last name is $linefromfile[1]. ");
  print ("Username is $linefromfile[2]. ");
  print ("Classcode is $linefromfile[3]");
  print ("<br>");
}
fclose($file);
?>