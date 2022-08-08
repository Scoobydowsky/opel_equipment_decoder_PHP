<?php

require 'vendor/autoload.php';

$controler= new \Scoobydowsky\OpelEquipmentDecoderPhpCli\ControllerEN();


echo $controler->Main();
do{
    $code = $controler->GetCode();
    echo $controler->SearchAndShowCode($code);
    $another = $controler->AskToAnotherCode();
}while($another == true);