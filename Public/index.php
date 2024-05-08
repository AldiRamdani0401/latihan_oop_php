<?php

include '../App/App.php';

$app = new App();

// $datas = [5, 4, 2, 1, 8, 3, 11, 6];

// function findMax($datas) {
//   $max;
//   $temp = $datas[0];
//   $sekarang;
//   for ($index = 1; $index < count($datas); $index++) {
//     $sekarang = $datas[$index];
//     echo "Apakah $sekarang > $temp ? => 'pengecekan ke " . $index . "'<br><br>";
//     if ($sekarang > $temp) {
//       echo "Ya, $sekarang > $temp = $sekarang <br><br>";
//       $temp = $sekarang;
//       $max = $temp;
//     } else {
//       echo "Tidak, $sekarang > $temp = $temp <br><br>";
//     }
//   }
//   $convertToString = " [ " . implode(", ", $datas) .  " ] ";
//   echo "dari array $convertToString nilai Max = $max";
// }

// function findMin($datas) {
//   $min;
//   $temp = $datas[0];
//   $sekarang;
//   for ($index = 1; $index < count($datas); $index++) {
//     $sekarang = $datas[$index];
//     echo "Apakah $sekarang < $temp ? => 'pengecekan ke " . $index . "'<br><br>";
//     if ($sekarang < $temp) {
//       echo "Ya, $sekarang < $temp = $sekarang <br><br>";
//       $temp = $sekarang;
//       $min = $temp;
//     } else {
//       echo "Tidak, $sekarang < $temp = $temp <br><br>";
//     }
//   }
//   $convertToString = " [ " . implode(", ", $datas) .  " ] ";
//   echo "dari array $convertToString nilai Min = $min";
// }

// // findMax($datas);
// // findMin($datas);


// function pemisahanGanjilGenap ($angka) {
//   $ganjil = array();
//   $genap = array();
//   $index = 1;
//   while ($index <= $angka ) {
//     if ($index % 2 == 0) {
//       array_push($genap, $index);
//     } else {
//       array_push($ganjil, $index);
//     }
//     $index++;
//   }
//   $convertGanjilToString = " [ " . implode(", ", $ganjil) .  " ] ";
//   $convertGenapToString = " [ " . implode(", ", $genap) .  " ] ";

//   echo "Ganjil <br>" . $convertGanjilToString . "<br><br>";
//   echo "Genap <br>" . $convertGenapToString;
// }

// pemisahanGanjilGenap(100);