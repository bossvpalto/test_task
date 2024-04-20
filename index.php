<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<h1>Тестовое задание</h1>

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
<form name="form" method="post" action="#">
    <input type="text" name="number" placeholder="Введите сюда номер телефона для проверки" value="<? echo $_REQUEST['number']; ?>" />
    <input type="submit" name="submit"  />
</form>    
<?

if (isset($_REQUEST['submit']))
    {
        $country=getCountry($_REQUEST['number']);
        echo "Введённый Вами номер ".$_REQUEST['number'];
        echo " относится к стране ".$country;
    }




?>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>