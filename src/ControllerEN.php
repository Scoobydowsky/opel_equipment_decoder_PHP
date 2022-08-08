<?php

namespace Scoobydowsky\OpelEquipmentDecoderPhpCli ;

class ControllerEN implements ControllerInterface
{

    public function Main(): string
    {
        $logo = <<<LOGO
                   _       _                    _           
                  | |     | |                  | |          
   ___  _ __   ___| |   __| | ___  ___ ___   __| | ___ _ __ 
  / _ \| '_ \ / _ \ |  / _` |/ _ \/ __/ _ \ / _` |/ _ \ '__|
 | (_) | |_) |  __/ | | (_| |  __/ (_| (_) | (_| |  __/ |   
  \___/| .__/ \___|_|  \__,_|\___|\___\___/ \__,_|\___|_|   
       | |                                                  
       |_|
LOGO.PHP_EOL;
        $author = "Created by Tomasz @scoobydowsky Woytkowiak".PHP_EOL;
        $github = "Github: https://github.com/Scoobydowsky".PHP_EOL;
        return $logo.$author.$github;
    }

    public function GetCode(): string
    {
        return strtoupper(readline("Write down equipment code: "));
    }

    public function SearchAndShowCode(string $code): string
    {
        echo "CODE - DESCRIPTION".PHP_EOL;
        $file = file_get_contents("src/CodeListEN.json");
        $codeList = json_decode($file,true);
        $description = "Code Undefined";
        foreach ($codeList as ["Code" => $codeOnArray , "description" => $descriptionOnArray]){
            if($codeOnArray === $code){
                $description = $descriptionOnArray;
                break;
            }
        }
        return $code. " - ".$description.PHP_EOL;
    }

    public function AskToAnotherCode()
    {
        do{
            $question = readline("Do you want search next Code? (y/n)");
            $check = ($question == "y" || $question == "n") ? $check = 1 : $check = 0 ;
        }while($check == 0);
        if($check == 1){
            if($question == "y"){
                $returnStatus = true;
            }else{
                $returnStatus = false;
            }
        }
        return $returnStatus;
    }
}