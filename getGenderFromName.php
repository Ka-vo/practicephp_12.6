<?php
require "getPartsFromFullname.php";

function getGenderFromName($fullNameString)
{
   $array  = getPartsFromFullname($fullNameString);
   $gender = 0;
   $name = $array['name'];
   if (mb_substr($name, -1) == "а") {
      $gender = $gender - 1;
   } elseif (mb_substr($name, -1) == "н" || mb_substr($name, -1) == "й") {
      $gender = $gender + 1;
   }

   $surname =  $array['surname'];
   if (mb_substr($surname, -2) == "ва") {
      $gender = $gender - 1;
   } elseif (mb_substr($surname, -1) == "в") {
      $gender = $gender  + 1;
   }

   $patronomyc =  $array['patronomyc'];
   if (mb_substr($patronomyc, -3) == "вна") {
      $gender = $gender - 1;
   } elseif (mb_substr($patronomyc, -2) == "ич") {
      $gender = $gender  + 1;
   }

   $total = ($gender <=> 0);
   if ($total == 1) {
      return "Мужской пол";
   } elseif ($total == -1) {
      return "Женский пол";
   } else {
      return  "Неопределенный пол";
   }
}

echo getGenderFromName('Иваново Ивар Ивановч');
