<?php
function getFullnameFromParts($surname, $name, $patronomyc)
{
  if ((is_string($surname))  && (is_string($name)) && (is_string($patronomyc))) {
    $fullName = $surname . " " . $name . " " . $patronomyc;
    return $fullName;
  } else {
    return 'УВЫ';
  }
}
echo getFullnameFromParts('Иваныч', "fghj", 'Иваныч');
