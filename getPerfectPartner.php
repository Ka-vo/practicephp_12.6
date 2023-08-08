<?php
require "mainArray.php";
echo "<pre>";
require "getFullnameFromParts.php";
echo "<pre>";
require "getGenderFromName.php";
echo "<pre>";
include "getShortName.php";
echo "<pre>";

function getPerfectPartner($surname, $name, $patronomyc, $field)
{
  $surname = mb_convert_case($surname, MB_CASE_TITLE_SIMPLE, "UTF-8");
  $name = mb_convert_case($name, MB_CASE_TITLE_SIMPLE, "UTF-8");
  $patronomyc = mb_convert_case($patronomyc, MB_CASE_TITLE_SIMPLE, "UTF-8");
  $fullName = getFullnameFromParts($surname, $name, $patronomyc);

  $genderFirst = getGenderFromName($fullName);

  $key = array_rand($field);
  $value = $field[$key];
  $fullNameFromArray = $value['fullname'];

  $genderSecond = getGenderFromName($fullNameFromArray);

  if (($genderFirst <> $genderSecond) && ($genderFirst <> 'Неопределенный пол') && ($genderSecond <> 'Неопределенный пол')) {
    $firstShortName = getShortName($fullName);
    $secondShortName = getShortName($fullNameFromArray);
    $number = rand(50, 100) . ',' . rand(0, 99);
    $couple = $firstShortName . ' + ' . $secondShortName . ' =' . "\n" .  (mb_chr(9825, 'UTF-8'))  . ' идеально на ' . $number . '% ' . (mb_chr(9825, 'UTF-8'));
    return $couple;
  } elseif ($genderFirst <> 'Неопределенный пол') {
    while (($genderFirst == $genderSecond) || ($genderSecond == 'Неопределенный пол')) {
      $key = array_rand($field);
      $value = $field[$key];
      $fullNameFromArray = $value['fullname'];
      $genderSecond = getGenderFromName($fullNameFromArray);
    }
    $firstShortName = getShortName($fullName);
    $secondShortName = getShortName($fullNameFromArray);
    $number = rand(50, 100) . ',' . rand(0, 99);
    $couple = $firstShortName . ' + ' . $secondShortName . ' =' . "\n" .  (mb_chr(9825, 'UTF-8'))  . ' идеально на ' . $number . '% ' .  (mb_chr(9825, 'UTF-8'));
    return $couple;
  } else {
    return 'увы';
  }
}
print_r(getPerfectPartner('Иванова', 'Марина', 'Петровна', $example_persons_array));
//print_r(getPerfectPartner('Ли', 'Хунь', 'яНЬ', $example_persons_array));
//print_r(getPerfectPartner('Букин', 'Геннадий', 'ВЛАДИМИРОВИЧ', $example_persons_array));
