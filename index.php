<?php


// Проверяем согласие на куки
if ($_REQUEST['allow_cookies']==1)
    {
    setcookie("allow", 1, /*time()+60*60*24*/ strtotime('+1 days') ); // 1 сутки
    }



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<style>
.task3
    {
        background-image:url('pic/bg.png');
        background-repeat: repeat;
        border-width:0px;
        border-style:none;
        display:inline-block;
        margin:100px;
        @media (max-width:991px) {
          width:350px;
        }
    }
.my_card
{
        background-image:url('pic/black10p.png');
        packground-color:none;
        position:relative;
        width:285px;
        height:289px;
        border-radius:10px;
        display: flex;
        flex-direction: column;
        padding:40px;
        margin:10px;
        float:left;
}
.card-body
{
    padding-top:30px;
}
.card-text
{
    font-weight:bolder;
}
</style>
<h1>Тестовое задание</h1>
<div class="container">
<h2>Задача 1: проверка телефонных номеров</h2>
<?

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

// Проверяем введённый номер телефона
if (isset($_REQUEST['submit']))
    {
        $country=getCountry($_REQUEST['number']);
        echo "Введённый Вами номер ".$_REQUEST['number'];
        echo " относится к стране ".$country;
    }
?>  
</div>

<div class="task3 container">

<h2>Задача 3: Вёрстка по образцу</h2>
<h1>Korzyści ze współpracy z nami</h1>


<div class="my_card" style="width: 18rem;">
  <img src="pic/1.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Przechowywanie towarów ponadgabarytowych</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/2.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Elastyczne warunki współpracy</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/3.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Integracja i zarządzanie zamówieniami</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/4.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Wysyłka zamówień w dniu kompletacji</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/5.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Niskie koszty dostawy</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/6.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Gwarancja bezpieczeństwa towarów</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/7.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Całodobowy wideo monitoring</p>
    <a href="#" >Opis</a>
  </div>
</div>

<div class="my_card" style="width: 18rem;">
  <img src="pic/8.png" class="card-img-top" style="width:60px;" alt="...">
  <div class="card-body">
    <p class="card-text">Wysyłka zamówień do różnych krajów</p>
    <a href="#" >Opis</a>
  </div>
</div>

</div>














<div class="modal " tabindex="-1" id="myModal">
  <div class="modal-dialog" style="margin-right:0px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Задача 2: Всплывающее окно</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>На нашем сайте используются куки!</p>
        <p>Согласитесь на их использование и я перестану вас беспокоить )</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <a href="?allow_cookies=1"><button type="button" class="btn btn-primary">Я согласен</button></a>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous">
</script>
<? 

if ($_COOKIE['allow']!=1 )
    {
        echo "
            <script type=\"text/javascript\">
            $(window).on('load', function() {
            $('#myModal').modal('show');
                });
        </script>";
    }
?>

</body>
</html>