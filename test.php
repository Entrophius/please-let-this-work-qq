<?php
$filename="student.txt";
$fileaction="r";

$file = fopen($filename,$fileaction);

// var_dump($_POST);

/* The intended behavior is for the print functions to only print the lines that contain a matching classcode
which can be any combination of numbers and letters, but right now it's just A3 and A4
example: if I enter "A1" in the input field on the html page it should return a message saying "No matches found"
but if I enter A3 it should print all lines containing A3, and NOT any other lines. It will always be on the same place on each line, last. */

while ( $linefromfile = fgets($file))
{

$linefromfile = trim($linefromfile);

$linefromfile = explode(";", $linefromfile);

var_dump($linefromfile);

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

/* current output is: array(4) { [0]=> string(6) "Mangla" [1]=> string(5) "Surma" [2]=> string(5) "Bngli" [3]=> string(2) "A3" } First name is Mangla. Last name is Surma. Username is Bngli. Classcode is A3
array(4) { [0]=> string(7) "Testone" [1]=> string(7) "Lastone" [2]=> string(2) "tl" [3]=> string(2) "A4" } array(4) { [0]=> string(4) "Link" [1]=> string(7) "Surname" [2]=> string(2) "ls" [3]=> string(2) "A3" } First name is Link. Last name is Surname. Username is ls. Classcode is A3

*/
?>