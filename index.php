<?php



// Task 1
// Перебор массива и определение страны телефона
$source_url="https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json";
$html = file_get_contents($source_url);
$arCodes=json_decode($html, true);


function getCountry($number)
    {
        global $arCodes;
        foreach ($arCodes as $code)
            {
                $newcode    =strtr($code['mask'], array (' ' => '','#' => '','-' => '','+' => '','(' => '',')' => ''));
                $newnumber  =strtr($number  , array (' ' => '','#' => '','-' => '','+' => '','(' => '',')' => ''));
                if ( substr($newnumber, 0, strlen($newcode)) === $newcode  )
                    {
                        return $code['name_ru'];
                    }
            }
}   // end of getCountry


echo "+375(29)123-45-67   ";
echo getCountry("+375(29)123-45-67");
echo "<br>";

echo "+7 (495) 123 45 67   ";
echo getCountry("+7 (495) 123 45 67");
echo "<br>";

echo "7 777 123-45-67   ";
echo getCountry("7 777 123-45-67");
echo "<br>";






?>