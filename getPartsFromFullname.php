<?php
function getPartsFromFullname($fullNameString)
{
  $nameArray = explode(" ", $fullNameString);
  $keysArray = ['surname', 'name', 'patronomyc'];

  return array_combine($keysArray, $nameArray);
}
print_r(getPartsFromFullname("Букин Геннадий Владимирович"));
?>
</br>


//Тренировка ООП
// class getPartsFromFullname
// {
// public $fullNameString;
// public function test()
// {
// $nameArray = explode(" ", $this->fullNameString);
// $keysArray = ['surname', 'name', 'patronomyc'];

// return array_combine($keysArray, $nameArray);
// }
// }

// $fullName = new getPartsFromFullname();
// $fullName->fullNameString = " Букин Геннадий Владимирович";
// print_r($fullName->test());