<?php
$filename="student.txt";
$fileaction="r";

$file = fopen($filename,$fileaction);

var_dump($_POST);

/* The intended behavior is for the print functions to only print the lines that contain a matching classcode
which can be any combination of numbers and letters, but right now it's just A3 and A4
example: if I enter "A1" in the input field on the html page it should return a message saying "No matches found"
but if I enter A3 it should print all lines containing A3, and NOT any other lines. It will always be on the same place on each line, last. */

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
$linefromfile = explode(";", $linefromfile);

var_dump($_POST);
  print ("First name is $linefromfile[0]. ");
  print ("Last name is $linefromfile[1]. ");
  print ("Username is $linefromfile[2]. ");
  print ("Classcode is $linefromfile[3]");
  print ("<br>");
}
fclose($file);

// current output is: array(2) { ["classcode_input"]=> string(2) "A3" ["continue"]=> string(8) "Continue" }
?>