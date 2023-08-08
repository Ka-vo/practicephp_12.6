<?php
//require "getPartsFromFullname.php";
echo "<pre>";
function getShortName($fullNameString)
{
   $array  = getPartsFromFullname($fullNameString);
   $name =  $array['name'];
   $ferstLetter = mb_substr($name, 0, 1);
   $array['name'] = $ferstLetter . '.';
   $endString = $array['surname'] . " " . $array['name'];
   return  $endString;
}
print_r(getShortName("Букин Геннадий Владимирович"));
