<?php


// Task 1
// Перебор массива и определение страны телефона
$source_url="https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json";
$html = file_get_contents($source_url);
$arCodes=json_decode($html, true);


foreach ($arCodes as $code)
    {
        print_r($code);
    }



?>