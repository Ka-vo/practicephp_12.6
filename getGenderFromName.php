<?php
require "getPartsFromFullname.php";

function getGenderFromName($fullNameString){
    $array  = getPartsFromFullname($fullNameString);  
    $gender = 0;
    
     foreach ($array as $key => $value) {
      $lastLetterMen = mb_substr($value, -1);
      $lastLetterWoman = mb_substr($value, -2);
      if($key == 'surname' && $lastLetterMen == "в") {
         $gender = $gender +  1;
     } elseif($key = 'surname' && $lastLetterWoman = "ва") {
        $gender = $gender  - 1;
     }
    
   if ($gender >= 1){
    return 'мужской';
   }
     
   return  $gender ;
}
}
echo getGenderFromName('Иванова Иван Иванович');


// function getGenderFromName($fullNameString){
//     $array  = getPartsFromFullname($fullNameString);  
//     $gender = 0;
    

//     $name = $array['name'];
//     if (mb_substr($name, -1) == "а"){
//       $gender = $gender -1;  
//     }elseif(mb_substr($name, -1) == "н" || mb_substr($name, -1) == "й"){
//        $gender = $gender + 1 ; 
//     }

//     $surname =  $array['surname'];
//     if(mb_substr($name, -1) == "ва") {
//           $gender = $gender - 1 ;
//       } elseif(mb_substr($name, -1) == "в") {
//          $gender = $gender  +1;
//       }
//     //  foreach ($array as $key => $value) {
//     //   $lastLetterMen = mb_substr($value, -1);
//     //   $lastLetterWoman = mb_substr($value, -2);
//     //   if($key == 'surname' && $lastLetterMen == "в") {
//     //      $gender = $gender + 1 ;
//     //  } elseif($key == 'surname' && $lastLetterWoman = "ва") {
//     //     $gender = $gender  -1;
//     //  }

//     //  if($key == 'name' && ($key == 'surname' && (mb_substr($value, -1) == "й" || mb_substr($value, -1) == "н")) ) {
//     //      $gender = $gender + 1 ;
//     //  } elseif($key == 'surname' && mb_substr($value, -1) == "а") {
//     //     $gender = $gender  -1;
//     //  }

//     return $gender;

// //     if ($gender >= 1){
// //     return 'мужской';
// //    } else{
// //      return 'женский';  
// //    }
     
   
   
     
//    //return  $gender;
//   // return $lastLetterMen;

// }
// echo getGenderFromName('Иванов Иван Иванович');