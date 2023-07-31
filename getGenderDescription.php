<?php
require "mainArray.php";
echo "<pre>";
require "getGenderFromName.php";
echo "<pre>";

function getGenderDescription($example_persons_array)
{
    $menArray = array_filter($example_persons_array, function ($field) {
        return getGenderFromName($field['fullname']) === 'Мужской пол';
    });
    $womenArray = array_filter($example_persons_array, function ($field) {
        return getGenderFromName($field['fullname']) === 'Женский пол';
    });
    $undefinedArray = array_filter($example_persons_array, function ($field) {
        return getGenderFromName($field['fullname']) === 'Неопределенный пол';
    });

    $men = count($menArray);
    $women = count($womenArray);
    $undefined = count($undefinedArray);
    $summ = $men + $women + $undefined;
    $manPrecent = round(($men * 100) / $summ);
    $womanPrecent = round(($women * 100) / $summ);
    $undefinedPrecent = round(100 - ($manPrecent + $womanPrecent));
    $end = <<<MYHEREDOCTEXT
    Гендерный состав аудитории:
    <pre>
    ---------------------------
    <pre>
    Мужчины - $manPrecent%
    <pre>
    Женщины - $womanPrecent%
    <pre>
    Неопределнно - $undefinedPrecent%
    MYHEREDOCTEXT;
    return $end;
}


print_r(getGenderDescription($example_persons_array));
