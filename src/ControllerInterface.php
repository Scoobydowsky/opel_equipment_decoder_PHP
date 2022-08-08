<?php

namespace Scoobydowsky\OpelEquipmentDecoderPhpCli ;

interface ControllerInterface
{
    public function Main():string;
    public function GetCode():string;
    public function SearchAndShowCode(String $code);
    public function AskToAnotherCode();
}