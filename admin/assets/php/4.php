<!-- function
 1. function yang kita buat
 2. function bawaan strlen(), in_array 
 -->
<?php

function callName()
{
    echo "Nama saya Mulyono";
}

function callNamelagi()
{
    return "Nama saya Paquito";
}

function perkalian($angka1, $angka2)
{
    // $angka1 = 50;
    // $angka2 = 50;
    $total = $angka1 * $angka2;
    return $total;
}

callName();
echo "<br>";
echo callNameLagi();
echo "<br>";
echo perkalian(30, 20);
echo "<br>";
echo perkalian(50, 20);
